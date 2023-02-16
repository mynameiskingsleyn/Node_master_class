<?php

namespace App\Services\Report;

use Illuminate\Support\Facades\DB;
use stdClass;
use Carbon\Carbon;
use App\Services\ACL\AclService;
use App\Services\User\AccountService;
use App\Services\Common\DateService;
use App\Services\Common\ConnectionService;
use App\Services\Common\ConnectionServiceTrait;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use App\Services\Report\ReportTypesConstant;
use App\Services\Report\ReportStatusConstant;
use Illuminate\Database\QueryException;
use App\Exceptions\Report\ReportException;
use App\Exceptions\Report\ReportCodes;
use LNWebAPI2\Plugins\MoLog\Log;
use Illuminate\Support\Facades\App;
use App\Logging\Writer;
use App\Models\Portfolio;
use App\Models\Report;
use App\Models\ReportWatcher;

class ReportsService
{
    use ConnectionServiceTrait;

    const DEFAULT_LIMIT = 15;

    const DEFAULT_SORTING = 'start_date';

    /**
     * @var ConnectionService
     */
    protected $connectionService;

    /**
     * @var ReportsQueryBuilderService
     */
    protected $queryBuilder;

    public function __construct(
        ConnectionService $connectionService,
        ReportsQueryBuilderService $queryBuilder
    ) {
        $this->connectionService = $connectionService;
        $this->queryBuilder = $queryBuilder;
        $this->connectionService->setConnection();
    }

    public function findHistoryReport($params)
    {
        $historyQuery = Report::withoutGlobalScopes()->fromRaw('report R')
            ->select(
                'PFL.record_id',
                'R.report_id',
                'R.unique_id',
                'R.lexid',
                'R.output_type',
                'R.status',
                'R.date_added',
                'R.date_returned',
                'PFL.name_first',
                'PFL.name_last',
                'PFL.status as pf_status',
                'PW.user_id as watcher'
            )
            ->leftJoin(DB::raw('portfolio PFL'), function ($join) {
                $join->on('R.unique_id', '=', 'PFL.unique_id');
            })
            ->leftJoin(DB::raw('portfolio_watcher PW'), function ($join) {
                $join->on('PFL.record_id', '=', 'PW.record_id')
                    ->on('PW.user_id', '=', DB::raw('"' . App::make(AccountService::class)->currentWatcher() . '"'))
                    ->on('PW.active', '=', DB::raw("'1'"));
            })
            ->where('R.unique_id', '=', $params['id']);

        $employeeId = App::make(AccountService::class)->employeeId();

        if ($employeeId) {
            $historyQuery->where('R.lexid', '<>', $employeeId);
        }
        try {
            return $historyQuery->where([
                ['R.report_id', '=', $params['historyId']],
                ['R.output_type', '=', $params['type']]
            ])->get()->first();
        } catch (QueryException $ex) {
            $message = ReportCodes::message(ReportCodes::QUERY_ERROR);
            Writer::queryError(__METHOD__, $message);
            throw new ReportException(ReportCodes::QUERY_ERROR, $message);
        }
    }

    /**
     * Returns the number of actives subjects in the portfolio
     * @return number
     */
    public function activeSubjects()
    {
        try {
            return Portfolio::where('status', 1)->count();
        } catch (QueryException $ex) {
            $message = ReportCodes::message(ReportCodes::QUERY_ERROR);
            Writer::queryError(__METHOD__, $message);
            throw new ReportException(ReportCodes::QUERY_ERROR, $message);
        }
    }

    private function page($params, $arg = 'page')
    {
        $page = $params[$arg] ?? 0;
        $page += 1;     // need to increment by 1 since MatPaginator starts with 0 index

        return $page;
    }

    private function limit($params)
    {
        return $params['limit'] ?? self::DEFAULT_LIMIT;
    }

    public function search(array $params = [])
    {
        $searchQuery = $this->queryBuilder->getSearchQuery($params['filters'] ?? null);

        try {
            $results = $searchQuery->get();
        } catch (QueryException $ex) {
            $message = ReportCodes::message(ReportCodes::QUERY_ERROR);
            Writer::queryError(__METHOD__, $message);
            throw new ReportException(ReportCodes::QUERY_ERROR, $message);
        }
        $reports = new Collection();

        if ($results->count()) {
            $data = $results->groupBy('unique_id');

            foreach ($data as $subject) {
                foreach ($subject as $record) {
                    $report_index = $reports->search(function ($item) use ($record) {
                        return $item->unique_id === $record->unique_id;
                    });

                    if ($report_index === false) {
                        $report = new stdClass();
                        // defaults
                        $report->max_pr_date = null;
                        $report->max_cr_date = null;
                        $report->max_nr_date = null;

                        $report->report_date = null;
                        $report->report_type = null;

                        $report->pr_id = null;
                        $report->cr_id = null;
                        $report->nr_id = null;

                        $report->pf_status = null;
                        $report->pr_status = null;
                        $report->cr_status = null;
                        $report->nr_status = null;

                        $report->status = null;
                    } else {
                        $report = $reports->get($report_index);
                    }

                    $report->record_id = $record->record_id;
                    $report->unique_id = $record->unique_id;
                    $report->name_first = $record->name_first;
                    $report->name_last = $record->name_last;
                    $report->lexid = $record->lexid;
                    $report->watcher = $record->user_id;
                    $report->pf_status = $record->pf_status;

                    $report_output_type = strtolower($record->output_type);

                    $max_date_field = 'max_' . $report_output_type . '_date';
                    $report->$max_date_field = $record->date_returned;

                    $rpt_status_field = $report_output_type . '_status';
                    $report->$rpt_status_field = $record->status;

                    $rpt_id_field = $report_output_type . '_id';
                    $report->$rpt_id_field = $record->report_id;

                    if ($report_index !== false) {
                        $reports->merge($report);
                    } else {
                        $reports->push($report);
                    }
                }
            }

            // Add Report status & date
            if ($reports) {
                foreach ($reports as $reportRef) {
                    $reportRef->status = $this->getReportStatus($reportRef);
                    $reportRef->report_date = $this->getReportMaxDate($reportRef);
                }
            }
        }

        $reportsResults = $reports->sortBy(
            $this->queryBuilder->sortBy($params['sortBy'] ?? 'report_date'),
            SORT_STRING,
            ($params['sortDir'] ?? 'desc') === 'desc'
        );

        return new LengthAwarePaginator(
            $reportsResults->forPage($this->page($params), $this->limit($params)),
            $reportsResults->count(),
            $this->limit($params),
            $this->page($params)
        );
    }

    public function alerts(array $params = [])
    {
        $alertsQuery = $this->queryBuilder->alertsQuery($params['filters'] ?? null);

        if (empty($params['sortBy']) === true) {
            $params['sortBy'] = self::DEFAULT_SORTING;
        }

        $this->queryBuilder->setSorting($alertsQuery, $params, $this->queryBuilder->alertsResultsColumns());

        try {
            return $alertsQuery->paginate($this->limit($params), ['*'], 'page', $this->page($params));
        } catch (QueryException $ex) {
            $message = ReportCodes::message(ReportCodes::QUERY_ERROR);
            Writer::queryError(__METHOD__, $message);
            throw new ReportException(ReportCodes::QUERY_ERROR, $message);
        }
    }

    public function reports(array $params = [])
    {
        $reportsQuery = $this->queryBuilder->reportsQuery($params['filters'] ?? null);

        if (empty($params['sortBy']) === true) {
            $params['sortBy'] = self::DEFAULT_SORTING;
        }

        $this->queryBuilder->setSorting($reportsQuery, $params, $this->queryBuilder->reportsResultsColumns());

        try {
            return $reportsQuery->paginate($this->limit($params), ['*'], 'page', $this->page($params));
        } catch (QueryException $ex) {
            $message = ReportCodes::message(ReportCodes::QUERY_ERROR);
            Writer::queryError(__METHOD__, $message);
            throw new ReportException(ReportCodes::QUERY_ERROR, $message);
        }
    }

    public function history($params)
    {
        try {
            return $this->queryBuilder->historyQuery($params)
                ->paginate($this->limit($params), ['*'], 'page', $this->page($params));
        } catch (QueryException $ex) {
            $message = ReportCodes::message(ReportCodes::QUERY_ERROR);
            Writer::queryError(__METHOD__, $message);
            throw new ReportException(ReportCodes::QUERY_ERROR, $message);
        }
    }

    public function startWatching($recordId)
    {
        try {
            return DB::connection($this->getConnection())->table('portfolio_watcher')
                ->insert([
                    'user_id' => DB::raw("'" . App::make(AccountService::class)->currentWatcher() . "'"),
                    'user_email' => DB::raw("'" . App::make(AccountService::class)->emailWatcher() . "'"),
                    'record_id' => $recordId,
                    'active' => DB::raw("'1'"),
                    'start_date' => DB::raw('NOW()'),
                    'end_date' => null
                ]);
        } catch (QueryException $ex) {
            $message = ReportCodes::message(ReportCodes::QUERY_ERROR);
            Writer::queryError(__METHOD__, $message);
            throw new ReportException(ReportCodes::QUERY_ERROR, $message);
        }
    }

    public function addAgencyNote($notes, $reportId, $reportType)
    {
        try {
            return Report::where([
                    'report_id' => $reportId,
                    'output_type' => DB::raw("'" . $reportType . "'")
                ])
                ->update([
                    'notes' => DB::raw("'" . $notes . "'"),
                ]);
        } catch (QueryException $ex) {
            $message = ReportCodes::message(ReportCodes::QUERY_ERROR);
            Writer::queryError(__METHOD__, $message);
            throw new ReportException(ReportCodes::QUERY_ERROR, $message);
        }
    }

    public function agencyNotes($reports)
    {
        try {
            return Report::select('report_id', 'output_type', 'notes')
                ->whereIn('report_id', $reports)
                ->get();
        } catch (QueryException $ex) {
            $message = ReportCodes::message(ReportCodes::QUERY_ERROR);
            Writer::queryError(__METHOD__, $message);
            throw new ReportException(ReportCodes::QUERY_ERROR, $message);
        }
    }

    public function deleteAgencyNote($reportId, $reportType)
    {
        try {
            return Report::where([
                    'report_id' => $reportId,
                    'output_type' => DB::raw("'" . $reportType . "'")
                ])
                ->update([
                    'notes' => DB::raw("null"),
                ]);
        } catch (QueryException $ex) {
            $message = ReportCodes::message(ReportCodes::QUERY_ERROR);
            Writer::queryError(__METHOD__, $message);
            throw new ReportException(ReportCodes::QUERY_ERROR, $message);
        }
    }

    public function stopWatching($recordId)
    {
        try {
            return DB::connection($this->getConnection())->table('portfolio_watcher')
                ->where('record_id', $recordId)
                ->where('user_id', DB::raw("'" . App::make(AccountService::class)->currentWatcher() . "'"))
                ->where('active', DB::raw("'1'"))
                ->update([
                    'active' => DB::raw("'0'"),
                    'end_date' => DB::raw('NOW()')
                ]);
        } catch (QueryException $ex) {
            $message = ReportCodes::message(ReportCodes::QUERY_ERROR);
            Writer::queryError(__METHOD__, $message);
            throw new ReportException(ReportCodes::QUERY_ERROR, $message);
        }
    }

    public function trackReportView($reportRef, $type)
    {
        try {
            return DB::connection($this->getConnection())->table('report_watcher')
                ->insert([
                    'user_id' => DB::raw("'" . App::make(AccountService::class)->currentWatcher() . "'"),
                    'pr_report_id' => ($type === 'PR' || $type === 'COMPLETE' ? $reportRef->pr_id : null),
                    'cr_report_id' => ($type === 'CR' || $type === 'COMPLETE' ? $reportRef->cr_id : null),
                    'status' => DB::raw("'Viewed'"),
                    'date_added' => DB::raw('NOW()'),
                    'end_date' => null
                ]);
        } catch (QueryException $ex) {
            $message = ReportCodes::message(ReportCodes::QUERY_ERROR);
            Writer::queryError(__METHOD__, $message);
            throw new ReportException(ReportCodes::QUERY_ERROR, $message);
        }
    }

    public function getHistoryReport($historyId)
    {
        try {
            return Report::select('report_id', 'output_xml', 'date_added', 'date_returned')
                    ->where('report_id', $historyId)->get()->first();
        } catch (QueryException $ex) {
            $message = ReportCodes::message(ReportCodes::QUERY_ERROR);
            Writer::queryError(__METHOD__, $message);
            throw new ReportException(ReportCodes::QUERY_ERROR, $message);
        }
    }

    /**
     * Returns the number of Alerts for the logged in user
     * @return int
     */
    public function numAlerts()
    {
        try {
            $numAlertsQuery = $this->queryBuilder->numAlertsQuery();
            $numAlertResults = $numAlertsQuery ? $numAlertsQuery->get()->first() : null;
            if ($numAlertResults) {
                return ($numAlertResults->num_pr_alerts ?? 0) + ($numAlertResults->num_cr_alerts ?? 0);
            }
        } catch (QueryException $ex) {
            $message = ReportCodes::message(ReportCodes::QUERY_ERROR);
            Writer::queryError(__METHOD__, $message);
            throw new ReportException(ReportCodes::QUERY_ERROR, $message);
        }
        return 0;
    }

    public function numberReports()
    {
        try {
            $numReportsQuery = $this->queryBuilder->numReportsQuery();
            $numReportsResults = $numReportsQuery ? $numReportsQuery->get()->first() : null;
            if ($numReportsResults) {
                return ($numReportsResults->num_pr_alerts ?? 0) + ($numReportsResults->num_cr_alerts ?? 0);
            }
        } catch (QueryException $ex) {
            $message = ReportCodes::message(ReportCodes::QUERY_ERROR);
            Writer::queryError(__METHOD__, $message);
            throw new ReportException(ReportCodes::QUERY_ERROR, $message);
        }
        return 0;
    }

    public function getReportDate($reportRef, string $type)
    {
        if (empty($reportRef)) {
            return null;
        }
        switch ($type) {
            case ReportTypesConstant::PUBLIC_RECORD:
                return $reportRef->max_pr_date ? App::make(DateService::class)->getLocalDate($reportRef->max_pr_date)
                      ->toDateTimeString() : null;
                break;
            case ReportTypesConstant::CREDIT_REPORT:
                return $reportRef->max_cr_date ? App::make(DateService::class)->getLocalDate($reportRef->max_cr_date)
                    ->toDateTimeString() : null;
                break;
            case ReportTypesConstant::NONFCRA_PUBLIC_RECORD:
                return $reportRef->max_nr_date ? App::make(DateService::class)->getLocalDate($reportRef->max_nr_date)
                    ->toDateTimeString() : null;
                break;
            case ReportTypesConstant::COMPLETE_REPORT:
                return $this->getReportMaxDate($reportRef);
                break;
        }
        return null;
    }

    public function getDate($value) {
      return $value ? App::make(DateService::class)->getLocalDate($value)
          ->toDateTimeString() : null;
    }

    public function getReportMaxDate($data)
    {
        $reportStatus = array_filter([
            $data->pr_status ?? null,
            $data->cr_status ?? null,
            $data->nr_status ?? null,
        ]);

        foreach ($reportStatus as $status) {
            if ($status === ReportStatusConstant::STATUS_NO_RECORD_REPORT) {
                return false;
            }
        }

        $maxPrDate = $data->max_pr_date ?? null;
        $maxCrDate = $data->max_cr_date ?? null;
        $maxNrDate = $data->max_nr_date ?? null;
        $dates = array_filter([
            $maxPrDate,
            $maxCrDate,
            $maxNrDate,
        ]);
        $localDates = [];

        foreach ($dates as $date) {
            array_push($localDates, App::make(DateService::class)->getLocalDate($date));
        }

        if (!empty($localDates) && count($localDates) > 1) {
            return max($localDates)->toDateTimeString();
        }
        return null;
    }

    public function getReportStatus($report)
    {
        $status = null;
        $allowedReports = App::make(AclService::class)->allowedReports();
        $statusList = array_filter([
            ReportTypesConstant::PUBLIC_RECORD => $report->pr_status ?? '',
            ReportTypesConstant::CREDIT_REPORT => $report->cr_status ?? '',
            ReportTypesConstant::NONFCRA_PUBLIC_RECORD => $report->nr_status ?? '',
        ]);
        if (count($statusList) > 1) {
            foreach ($statusList as $type => $value) {
                if (in_array($type, $allowedReports)) {
                    if (ReportStatusConstant::STATUS_NO_RECORD_REPORT === $value) {
                        $status = null;
                        break;
                    }
                    if (ReportStatusConstant::STATUS_PENDING_REPORT === $value) {
                        $status = ReportStatusConstant::STATUS_PENDING_REPORT;
                        break;
                    }
                    $status = ReportStatusConstant::STATUS_COMPLETE_REPORT;
                }
            }
        }
        return $status;
    }
}
