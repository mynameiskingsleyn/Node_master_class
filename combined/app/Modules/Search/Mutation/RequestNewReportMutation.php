<?php

namespace App\Modules\Search\Mutation;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Modules\Search\Operations\RequestNewReport;
use App\Modules\Search\Operations\GetSubject;
use App\Modules\Shared\Traits\Authorize;
use App\Services\UserManagement\UserManagementService;
use App\Exceptions\Search\RequestNewReportException;
use LNWebAPI2\Framework\Responses\Result;
use App\Services\ACL\AclService;
use Illuminate\Support\Facades\Validator;
use Closure;
use Illuminate\Support\Facades\App;
use LNWebAPI2\Plugins\MoLog\Log;
use App\Modules\Shared\Traits\ResponseHelperTrait;
use App\Exceptions\Report\ReportCodes;
use App\Logging\Writer;
use Rebing\GraphQL\Error\ValidationError;
use App\Services\Report\ReportsService;
use App\Exceptions\Search\EnrollException;
use App\Exceptions\Search\EnrollCodes;

class RequestNewReportMutation extends Mutation
{
    use Authorize;
    use ResponseHelperTrait;

    /**
     * @var requestSubject
     */
    private $requestSubject;

    /**
     * @var ReportsService
     */
    private $reportsService;

    /**
     * @var IUserManagementService
     */
    private $userManagementService;

    /**
     * @var GetSubject
     */
    private $subject;

    protected $attributes = [
        'name' => 'requestNewReport',
        'description' => 'Request new report for monitoring'
    ];

    public function __construct(
        RequestNewReport $requestSubject,
        UserManagementService $userManagement,
        GetSubject $subject,
        ReportsService $reportsService
    ) {
        $this->requestSubject = $requestSubject;
        $this->userManagementService = $userManagement;
        $this->reportsService = $reportsService;
        $this->subject = $subject;
        $this->aclService = App::make(AclService::class);
    }

    public function type(): Type
    {
        return GraphQL::type('NewReportResultInfo');
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
        $reportRef =  $this->getReportRef($input);
        if (App::make(AclService::class)->showAgencySubjectId()) {
            $params['AgencySubjectId'] = $input['agency_subject_id'] ?? '';
            $this->validateAgencyId($params);
        }
        if (App::make(AclService::class)->accessPublicRecord()) {
            $options['IncludePubRecReport'] = 1;
        }
        if (App::make(AclService::class)->accessCreditReport()) {
            $options['IncludeCreditReport'] = 1;
        }

        $this->requestSubject->setOptions($options);
        $response = $this->requestSubject->submit($params);
        $response = $this->lexidBypass($response, $params);

        $response = $this->processEnrollSuccess($response);
        $repsonse = $this->addInputEchoAndNotes($response, $reportRef);
        return $response;
    }

    /**
     * Adds InputEcho and Notes.
     * @param $response
     * @param $reportRef
     */
    private function addInputEchoAndNotes($response, $reportRef)
    {
        $params = [];
        if ($response !== null && $reportRef !== null && isset($response->InsiderReport)) {
            $params['SubjectId'] = $reportRef->unique_id;
            $params['LastName'] = $reportRef->name_last;
            $params['Lexid'] = (string) floatval($reportRef->lexid);
            if (!isset($response->InputEcho)) {
                $subjectInfo = $this->subject->submit($params);
                if (empty($subjectInfo->InputEcho) === false) {
                    $response->InputEcho = $subjectInfo->InputEcho;
                    $response->InputEcho->PubRecReportId = (App::make(AclService::class)->accessPublicRecord()) ? $reportRef->pr_id : null;
                    $response->InputEcho->CreditReportId = (App::make(AclService::class)->accessCreditReport()) ? $reportRef->cr_id : null;
                    $response->InputEcho->PubRecReportExId = (App::make(AclService::class)->accessNonFcraPublicRecord()) ? $reportRef->nr_id : null;
                }
            }
            $reportsId = [];
            if (empty($response->InputEcho->PubRecReportId) === false) {
                $reportsId[] = $response->InputEcho->PubRecReportId;
            }
            if (empty($response->InputEcho->PubRecReportExId) === false) {
                $reportsId[] = $response->InputEcho->PubRecReportExId;
            }
            if (empty($response->InputEcho->CreditReportId) === false) {
                $reportsId[] = $response->InputEcho->CreditReportId;
            }

            if (
                $this->aclService->disabledCreditNotes() === false &&
                $reportsId
            ) {
                $notes = $this->reportsService->agencyNotes($reportsId);
                $response->InsiderReport->Notes = $notes;
            }

            $response->InsiderReport->ReportRef = $reportRef;
        }
        return $response;
    }

    /**
     * Checks for lexis by pass and includes credit report.
     * @param $response
     */
    private function lexidBypass($response, $params)
    {
        if ($this->checkLexidBypass($response)) {
            $options['BypassLexIdCheck'] = 1;
            $options['IncludeCreditReport'] = 1;
            $this->requestSubject->setOptions($options);
            $response = $this->requestSubject->submit($params);
        }
        return $response;
    }
    /**
     * Gets report refs
     * @param $input
     */
    private function getReportRef($input)
    {
        $filters = [
                  'first_name' => $input['first_name'],
                  'middle_name' => $input['middle_name'],
                  'last_name' => $input['last_name'],
                  'ssn' => $input['ssn'],
                  'state' => $input['state']
                ];
        $reportRef = $this->reportsService->search(['filters' => $filters])->first();
        return $reportRef;
    }

    /**
     * Process different ESP responses for the Enroll request
     * @param mixed $response
     * @param bool $register
     */
    private function processEnrollSuccess($response)
    {
        if ($response && isset($response->Status)) {
            if ($response->Status->Success == false) {
                if (stristr($response->Status->Description, 'subject not found') !== false) {
                      throw new EnrollException(
                          EnrollCodes::SINGLE_INDETITY_NOT_RESOLVED,
                          EnrollCodes::message(EnrollCodes::SINGLE_INDETITY_NOT_RESOLVED)
                      );
                }
            }
            // check for individual before we return response
            if ($this->cantFindIndividual($response->Status->Description)) {
                throw new EnrollException(
                    ReportCodes::INDIVIDUAL_NOT_FOUND,
                    ReportCodes::message(ReportCodes::INDIVIDUAL_NOT_FOUND)
                );
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
                    if ($this->cantFindIndividual($response->Status->Description)) {
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
