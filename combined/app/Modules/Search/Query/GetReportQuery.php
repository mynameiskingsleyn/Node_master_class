<?php

namespace App\Modules\Search\Query;

use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Query;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Modules\Shared\Traits\Authorize;
use App\Services\Report\ReportsService;
use App\Services\Report\ReportTypesConstant;
use App\Modules\Search\Operations\GetReport;
use App\Modules\Search\Operations\GetSubject;
use App\Services\ACL\AclService;
use Illuminate\Support\Facades\App;
use App\Services\ACL\AuthorizeReportTrait as AuthorizeReport;
use Closure;

class GetReportQuery extends Query
{
    use Authorize;
    use AuthorizeReport;

    /**
     * @var GetReport
     */
    private $report;

    /**
     * @var GetSubject
     */
    private $subject;

    /**
     * @var ReportsService
     */
    private $reportsService;

    /**
     * @var AclService
     */
    private $aclService;

    protected $attributes = [
        'name' => 'getReport',
        'description' => 'Return available report(s)'
    ];

    public function __construct(
        GetReport $report,
        GetSubject $subject,
        ReportsService $reportsService,
        AclService $aclService
    ) {
        $this->report = $report;
        $this->subject = $subject;
        $this->reportsService = $reportsService;
        $this->aclService = $aclService;
    }

    public function type(): Type
    {
        return GraphQL::type('InsiderReport');
    }

    public function args(): array
    {
        return [
            'type' => [
                'name' => 'type',
                'type' => GraphQL::type('ReportTypesEnum'),
                'rules' => ['required', 'alpha'],
            ],
            'id' => [
                'name' => 'id',
                'type' => Type::id(),
                'rules' => ['required', 'alpha_num'],
            ],
            'historyId' => [
                'name' => 'historyId',
                'type' => Type::float(),
                'rules' => ['nullable', 'alpha_num'],
            ],
        ];
    }

    public function resolve($root, array $args, $context, ResolveInfo $info, Closure $getSelectFields)
    {
        // Check if report is allowed
        $this->authorizeReport($args);

        ini_set('memory_limit', '512M');
        $params = [];
        if (empty($args['historyId']) === false) {
            $reportRef = $this->reportsService->findHistoryReport($args);
            $reportRef->pr_id = null;
            $reportRef->cr_id = null;
            $reportRef->nr_id = null;
            $reportRef->pr_status = null;
            $reportRef->cr_status = null;
            $reportRef->nr_status = null;
            $reportRef->max_pr_date = null;
            $reportRef->max_cr_date = null;
            $reportRef->max_nr_date = null;
            switch (strtoupper($args['type'])) {
                case ReportTypesConstant::PUBLIC_RECORD:
                        $reportRef->pr_id = $reportRef->report_id;
                        $reportRef->max_pr_date = $reportRef->date_returned;
                        $reportRef->pr_status = $reportRef->status;
                    break;
                case ReportTypesConstant::NONFCRA_PUBLIC_RECORD:
                        $reportRef->nr_id = $reportRef->report_id;
                        $reportRef->max_nr_date = $reportRef->date_returned;
                        $reportRef->nr_status = $reportRef->status;
                    break;
                case ReportTypesConstant::CREDIT_REPORT:
                        $reportRef->cr_id = $reportRef->report_id;
                        $reportRef->max_cr_date = $reportRef->date_returned;
                        $reportRef->cr_status = $reportRef->status;
                    break;
            }
            // get latest lexid for this subject
            if (empty($args['id']) === false) {
                $latestReportRef = $this->reportsService->search(['filters' => ['id' => $args['id']]])->first();
                $params['Lexid'] =  (empty($latestReportRef) === false) ?
                (string) floatval($latestReportRef->lexid) : '';
            }
        } else {
            $reportRef = $this->reportsService->search(['filters' => $args])->first();
            $params['Lexid'] = (empty($reportRef) === false) ? (string) floatval($reportRef->lexid) : '';
        }

        if ($reportRef) {
            $params['SubjectId'] = $reportRef->unique_id;
            $params['LastName'] = $reportRef->name_last;

            switch (strtoupper($args['type'])) {
                case ReportTypesConstant::PUBLIC_RECORD:
                        $params['PubRecReportId'] = $reportRef->pr_id ?? '';
                    break;
                case ReportTypesConstant::NONFCRA_PUBLIC_RECORD:
                        $params['PubRecReportExId'] = $reportRef->nr_id ?? '';
                    break;
                case ReportTypesConstant::CREDIT_REPORT:
                        $params['CreditReportId'] = $reportRef->cr_id ?? '';
                    if (App::make(AclService::class)->canByPassLexIdCheck() && $params['Lexid'] === '-1') {
                        $this->report->setOptions([
                            'BypassLexIdCheck' => 1
                        ]);
                    }
                    break;
                case ReportTypesConstant::COMPLETE_REPORT:
                        $params['PubRecReportId'] = $reportRef->pr_id ?? '';
                        $params['CreditReportId'] = $reportRef->cr_id ?? '';
                    break;
            }

            $report = $this->report->submit($params);

            if (empty($report->InsiderReport) === false) {
                $subjectInfo = $this->subject->submit($params);

                $report->InsiderReport->ReportRef = $reportRef;
                $report->InsiderReport->SubjectEcho = $params;
                $report->InsiderReport->SubjectInformation = $subjectInfo->Subject;

                if (empty($report->InputEcho) === false) {
                    $reportsId = [];
                    if (empty($report->InputEcho->PubRecReportId) === false) {
                        $reportsId[] = $report->InputEcho->PubRecReportId;
                    }
                    if (empty($report->InputEcho->PubRecReportExId) === false) {
                        $reportsId[] = $report->InputEcho->PubRecReportExId;
                    }
                    if (empty($report->InputEcho->CreditReportId) === false) {
                        $reportsId[] = $report->InputEcho->CreditReportId;
                    }

                    if (
                        $this->aclService->disabledCreditNotes() === false &&
                        $reportsId
                    ) {
                        $notes = $this->reportsService->agencyNotes($reportsId);
                        $report->InsiderReport->Notes = $notes;
                    }
                }

                $this->reportsService->trackReportView($reportRef, strtoupper($args['type']));

                return $report->InsiderReport;
            }
        }
        return null;
    }
}
