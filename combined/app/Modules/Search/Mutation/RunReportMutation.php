<?php

namespace App\Modules\Search\Mutation;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Modules\Search\Operations\RunReport;
use App\Modules\Shared\Traits\Authorize;
use App\Services\Report\ReportTypesConstant;
use App\Services\Report\ReportsService;
use App\Services\ACL\AclService;
use Illuminate\Support\Facades\App;
use App\Exceptions\Authorization\AuthorizationException;
use App\Exceptions\Authorization\AuthorizationCodes;
use Illuminate\Database\QueryException;
use App\Exceptions\Report\ReportException;
use App\Exceptions\Report\ReportCodes;
use App\Modules\Shared\Traits\ResponseHelperTrait;
use Closure;

class RunReportMutation extends Mutation
{
    use Authorize;
    use ResponseHelperTrait;

    /**
     * @var RunReport
     */
    private $runReport;
    private $reportsService;

    protected $attributes = [
        'name' => 'runReport',
        'description' => 'Run Adhoc report'
    ];

    public function __construct(RunReport $runReport, ReportsService $reportsService)
    {
        $this->runReport = $runReport;
        $this->reportsService = $reportsService;
    }

    public function type(): Type
    {
        return GraphQL::type('InputEchoResult');
    }

    public function args(): array
    {
        return [
            'Subject' => [
                'type' => GraphQL::type('SubjectInfoInput')
            ],
            'ReportType' => [
                'type' => GraphQL::type('ReportTypesEnum'),
                'rules' => ['required'],
            ]
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $info, Closure $getSelectFields)
    {
        $lexid = null;

        if (empty($args['Subject']) === false && empty($args['Subject']['SubjectId']) === false) {
            try {
                $latestReportRef = $this->reportsService->search(['filters' => ['id' => $args['Subject']['SubjectId']]])
                    ->first();
                $lexid =  $latestReportRef ? $latestReportRef->lexid : null;
            } catch (QueryException $ex) {
                // TODO log here
                throw new ReportException(ReportCodes::QUERY_ERROR, ReportCodes::message(ReportCodes::QUERY_ERROR));
            }
        }

        switch ($args['ReportType']) {
            case ReportTypesConstant::PUBLIC_RECORD:
                $this->runReport->setOptions(['IncludePublicRecords' => 1]);
                if ($this->checkByPassLexid($lexid)) {
                    // TODO log here
                    throw new AuthorizationException(
                        AuthorizationCodes::ACTION_NOT_ALLOWED,
                        AuthorizationCodes::message(AuthorizationCodes::ACTION_NOT_ALLOWED)
                    );
                }
                break;
            case ReportTypesConstant::CREDIT_REPORT:
                $this->runReport->setOptions(['IncludeCreditReport' => 1]);
                // check if lexid need bypass
                if ($this->checkByPassLexid($lexid)) {
                    $this->runReport->setOptions([
                        'BypassLexIdCheck' => 1
                    ]);
                }
                break;
            case ReportTypesConstant::NONFCRA_PUBLIC_RECORD:
                $this->runReport->setOptions(['IncludePublicRecordEx' => 1]);
                break;
            case ReportTypesConstant::COMPLETE_REPORT:
                $this->runReport->setOptions([
                    'IncludeCreditReport' => 1,
                    'IncludePublicRecords' => 1,
                    'IncludePublicRecordEx' => 1,
                    ]);
                break;
        }
        $response = $this->runReport->submit($args['Subject']);
        // Final check for individual before we return response
        if (isset($response->Status) && $this->cantFindIndividual($response->Status->Description)) {
            // TODO log here
            throw new ReportException(
                ReportCodes::INDIVIDUAL_NOT_FOUND,
                ReportCodes::message(ReportCodes::INDIVIDUAL_NOT_FOUND)
            );
        }
        return $response;
    }

    private function checkByPassLexid($lexid)
    {
        return App::make(AclService::class)->canByPassLexIdCheck() && ((string) floatval($lexid) === '-1');
    }
}
