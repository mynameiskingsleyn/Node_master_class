<?php

namespace App\Modules\Search\Mutation;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Modules\Search\Operations\EnrollSubject;
use App\Modules\Shared\Traits\Authorize;
use App\Services\UserManagement\UserManagementService;
use App\Exceptions\Search\EnrollException;
use LNWebAPI2\Framework\Responses\Result;
use App\Services\ACL\AclService;
use Illuminate\Support\Facades\Validator;
use Closure;
use Illuminate\Support\Facades\App;
use App\Exceptions\Search\EnrollCodes;
use LNWebAPI2\Plugins\MoLog\Log;
use App\Modules\Shared\Traits\ResponseHelperTrait;
use App\Exceptions\Report\ReportCodes;
use App\Logging\Writer;
use Rebing\GraphQL\Error\ValidationError;

class EnrollSubjectMutation extends Mutation
{
    use Authorize;
    use ResponseHelperTrait;

    /**
     * @var enrollSubject
     */
    private $enrollSubject;

    /**
     * @var IUserManagementService
     */
    private $userManagementService;

    protected $attributes = [
        'name' => 'enrollSubject',
        'description' => 'Enroll individual for monitoring'
    ];

    public function __construct(
        EnrollSubject $enrollSubject,
        UserManagementService $userManagement
    ) {
        $this->enrollSubject = $enrollSubject;
        $this->userManagementService = $userManagement;
    }

    public function type(): Type
    {
        return GraphQL::type('SubjectInfoResult');
    }

    public function args(): array
    {
        return [
            'Subject' => [
                'type' => GraphQL::type('EnrollFormInput')
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $info, Closure $getSelectFields)
    {
        $input = $args['Subject'];
        $options = [];
        $params = [
            'Subject' => [
                'Name' => [
                    'First' => $input['first_name'] ?? '',
                    'Middle' => $input['middle_name'] ?? '',
                    'Last' => $input['last_name'] ?? '',
                    'Suffix' => $input['suffix'] ?? '',
                ],
                'Address' => [
                    'StreetAddress1' => $input['street_address'] ?? '',
                    'City' => $input['city'] ?? '',
                    'State' => strtoupper($input['state'] ?? ''),
                    'Zip5' => $input['zipcode'] ?? '',
                ],
                'DOB' => [
                    'Year' => $input['dob']['year'] ?? '',
                    'Month' => $input['dob']['month'] ?? '',
                    'Day' => $input['dob']['day'] ?? '',
                ],
                'SSN' => $input['ssn'] ?? '',
            ],
        ];

        if (App::make(AclService::class)->showAgencySubjectId()) {
            $params['AgencySubjectId'] = $input['agency_subject_id'] ?? '';
            $this->validateAgencyId($params);
        }

        $register = $input['register'] ?? false;

        if ($register) {
            $options['RegisterOnly'] = 1;
        }

        $this->enrollSubject->setOptions($options);
        $response = $this->enrollSubject->submit($params);

        // check lexid found or bypass if allowed
        if ($this->checkLexidBypass($response) && !$register) {
            $options['BypassLexIdCheck'] = 1;
            $options['IncludeCreditReport'] = 1;
            $this->enrollSubject->setOptions($options);

            $response = $this->enrollSubject->submit($params);
        }

        $response = $this->processEnrollSuccess($response, $register);

        if (isset($response->SubjectInfo) && $register) {
            // Update NVP value in LNAA with Subject LexID
            $this->updateUserLexid($response->SubjectInfo);
        }

        // Final check for individual before we return response
        if ($this->cantFindIndividual($response->Status->Description)) {
            // TODO log here
            throw new EnrollException(
                ReportCodes::INDIVIDUAL_NOT_FOUND,
                ReportCodes::message(ReportCodes::INDIVIDUAL_NOT_FOUND)
            );
        }

        return $response;
    }

    /**
     * Sets the new gotten Lexid as an NVP in MBS
     * @param $subject
     */
    private function updateUserLexid($subject)
    {
        if (!empty($subject->Lexid)) {
            $result = $this->userManagementService->setSubjectLexId($subject->Lexid);
            if ($result->getCode() !== EnrollCodes::SUCCESS) {
                // TODO log here
                throw new EnrollException($result->getCode(), $result->getMessage());
            }
        }
    }

    /**
     * Process different ESP responses for the Enroll request
     * @param mixed $response
     * @param bool $register
     */
    private function processEnrollSuccess($response, $register)
    {
        if ($response && isset($response->Status)) {
            if ($response->Status->Success == false) {
                if (
                    stristr($response->Status->Description, 'Subject Exists') !== false ||
                    stristr($response->Status->Description, 'Pending Records found') !== false
                ) {
                    // TODO log here
                    throw new EnrollException(
                        EnrollCodes::INDIVIDUAL_ENROLLED,
                        EnrollCodes::message(EnrollCodes::INDIVIDUAL_ENROLLED)
                    );
                } elseif (stristr($response->Status->Description, 'subject not found') !== false) {
                    if (!$register) {
                        // TODO log here
                        throw new EnrollException(
                            EnrollCodes::SINGLE_INDETITY_NOT_RESOLVED,
                            EnrollCodes::message(EnrollCodes::SINGLE_INDETITY_NOT_RESOLVED)
                        );
                    } else {
                        // TODO log here
                        throw new EnrollException(
                            EnrollCodes::REGISTRATION_FAILURE,
                            EnrollCodes::message(EnrollCodes::REGISTRATION_FAILURE)
                        );
                    }
                }
            }
        }
        return $response;
    }

    /**
     * Checks if user can bypass the Lexid checks
     * @param mixed $response
     * @return bool
     */
    private function checkLexidBypass($response)
    {
        if (App::make(AclService::class)->canByPassLexIdCheck()) {
            if ($response && isset($response->Status)) {
                if ($response->Status->Success == false) {
                    if (
                        stristr($response->Status->Description, 'Individual not found') !== false
                    ) {
                        return true;
                    }
                }
            }
        }
        return false;
    }

    private function errorResponse($error)
    {
        $response = new Result();
        $response->setCode($error->getCode());
        $response->setMessage($error->getMessage());
        return $response;
    }

    private function validateAgencyId($params)
    {
        $rules = [
            'AgencySubjectId' => 'required',
        ];

        $message = 'The Agency Subject ID field is required.';

        $validator = Validator::make($params, $rules);

        if (!$validator->passes()) {
            throw new ValidationError($message, $validator);
        };
    }
}
