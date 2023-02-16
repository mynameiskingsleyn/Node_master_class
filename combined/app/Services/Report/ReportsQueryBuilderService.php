<?php

namespace App\Services\Report;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Services\ACL\AclService;
use App\Services\Common\ConnectionService;
use App\Services\User\AccountService;
use App\Services\Common\ConnectionServiceTrait;
use App\Services\Report\ReportTypesConstant;
use Illuminate\Support\Facades\App;
use App\Modules\Shared\Formatters\LexIDFormatter;
use App\Models\ReportWatcher;
use App\Models\PortfolioWatcher;
use App\Models\Portfolio;
use App\Models\Report;

class ReportsQueryBuilderService
{
    use ConnectionServiceTrait;

    /**
     * @var ConnectionService
     */
    private $connectionService;

    public function __construct(ConnectionService $connectionService)
    {
        $this->connectionService = $connectionService;
    }

    public function alertsQuery($params = [])
    {
        $activeUser = DB::raw("'" . App::make(AccountService::class)->currentWatcher() . "'");
        $employeeId = DB::raw("'" . App::make(AccountService::class)->employeeId() . "'");

        $portfolioWatcherQuery = PortfolioWatcher::withoutGlobalScopes()->select(
            'pw.user_id',
            'pw.start_date',
            'p.record_id',
            'p.unique_id',
            'p.customer_key_2',
            'p.name_first',
            'p.name_last',
            'p.status'
        )
                    ->fromRaw('portfolio_watcher pw')
                    ->join(DB::raw('portfolio p'), 'pw.record_id', '=', 'p.record_id')
                    ->where([
                        ['pw.user_id', '=', $activeUser],
                        ['pw.active', '=', DB::raw("'1'")],
                        ['p.customer_key_2', '<>', DB::raw('LPAD(12, 0, ' . $employeeId . ')')]
                    ]);

        $mainAlertsQuery = ReportWatcher::select($this->alertsQueryColumns())
            ->fromSub($portfolioWatcherQuery, 'watchlist');
        // Join sub queries for PR
        $this->appendAlertsPrSubQuery($mainAlertsQuery)
        // Join sub queries for CR
            ->appendAlertsCrSubQuery($mainAlertsQuery)
        // Join sub queries for NR
            ->appendAlertsNrSubQuery($mainAlertsQuery)
        // Join with specific report types
            ->joinPrAlerts($mainAlertsQuery)
            ->joinCrAlerts($mainAlertsQuery)
            ->joinNrAlerts($mainAlertsQuery)
        // Join to get viewed reports
            ->appendAlertsViewedPr($mainAlertsQuery)
            ->appendAlertsViewedCr($mainAlertsQuery);

        return $mainAlertsQuery;
    }

    public function numAlertsQuery()
    {
        $columns = [];
        if (App::make(AclService::class)->accessPublicRecord()) {
            array_push($columns, DB::raw('SUM(alerts.pr_alert) as num_pr_alerts'));
        }
        if (App::make(AclService::class)->accessCreditReport()) {
            array_push($columns, DB::raw('SUM(alerts.cr_alert) as num_cr_alerts'));
        }
        if (!empty($columns)) {
            $alertsQuery = ReportWatcher::withoutGlobalScopes()->select($columns)
                            ->fromSub($this->alertsQuery(), 'alerts');
            return $alertsQuery;
        }
        return null;
    }

    public function alertsResultsColumns(): array
    {
        $columns = [
            'start_date' => 'watchlist.start_date',
            'record_id' => 'watchlist.record_id',
            'unique_id' => 'watchlist.unique_id',
            'name_first' => 'watchlist.name_first',
            'name_last' => 'watchlist.name_last',
            'pf_status' => 'watchlist.status',
            'lexid' => 'watchlist.customer_key_2',
            'watcher' => 'watchlist.user_id',
        ];
        if (App::make(AclService::class)->accessPublicRecord()) {
            $columns = array_merge($columns, [
                'max_pr_date' => 'PRPT1.date_returned',
                'pr_status' => 'PRPT1.status',
                'pr_id' => 'PRPT1.report_id',
            ]);
        }
        if (App::make(AclService::class)->accessCreditReport()) {
            $columns = array_merge($columns, [
                'max_cr_date' => 'CRPT1.date_returned',
                'cr_status' => 'CRPT1.status',
                'cr_id' => 'CRPT1.report_id',
            ]);
        }
        return $columns;
    }

    private function alertsQueryColumns(): array
    {
        $columns = [
            DB::raw('watchlist.user_id as watcher'),
            'watchlist.start_date',
            'watchlist.record_id',
            'watchlist.unique_id',
            DB::raw('watchlist.customer_key_2 as lexid'),
            'watchlist.name_first',
            'watchlist.name_last',
            'watchlist.status',
            DB::raw('watchlist.status as pf_status'),
        ];
        if (App::make(AclService::class)->accessPublicRecord()) {
            $columns = array_merge($columns, [
                DB::raw('PRPT1.report_id as pr_id'),
                DB::raw('PRPT1.status as pr_status'),
                DB::raw('PRPT.max_date AS max_pr_date'),
                DB::raw('VIEWED_PR.pr_report_id'),
                DB::raw('CASE WHEN VIEWED_PR.pr_report_id IS NULL AND PRPT.max_date > watchlist.start_date THEN 1 ELSE 0 END AS pr_alert'),
            ]);
        }
        if (App::make(AclService::class)->accessCreditReport()) {
            $columns = array_merge($columns, [
                DB::raw('CRPT1.report_id as cr_id'),
                DB::raw('CRPT1.status as cr_status'),
                DB::raw('CRPT.max_date AS max_cr_date'),
                DB::raw('VIEWED_CR.cr_report_id'),
                DB::raw('CASE WHEN VIEWED_CR.cr_report_id IS NULL AND CRPT.max_date > watchlist.start_date THEN 1 ELSE 0 END AS cr_alert')
            ]);
        }
        if (App::make(AclService::class)->accessNonFcraPublicRecord()) {
            $columns = array_merge($columns, [
                DB::raw('NRPT1.report_id as nr_id'),
                DB::raw('NRPT1.status as nr_status'),
                DB::raw('NRPT.max_date AS max_nr_date'),
            ]);
        }
        return $columns;
    }

    private function appendAlertsPrSubQuery(&$query)
    {
        if (App::make(AclService::class)->accessPublicRecord()) {
            $PRPTQuery = PortfolioWatcher::withoutGlobalScopes()->select(
                'p.record_id',
                DB::raw('max(rpt.date_returned) AS max_date')
            )
                ->fromRaw('portfolio_watcher pw')
                ->join(DB::raw('portfolio p'), 'pw.record_id', '=', 'p.record_id')
                ->leftJoin(DB::raw('report rpt'), 'p.unique_id', '=', 'rpt.unique_id')
                ->where([
                    ['pw.user_id', '=', DB::raw("'" . App::make(AccountService::class)->currentWatcher() . "'")],
                    ['pw.active', '=', DB::raw("'1'")],
                    ['rpt.output_type', '=', DB::raw("'PR'")]
                ])
                ->groupBy('p.record_id');

            $query->leftJoinSub($PRPTQuery, 'PRPT', function ($join) {
                $join->on('watchlist.record_id', '=', 'PRPT.record_id');
            });
        }
        return $this;
    }

    private function appendAlertsCrSubQuery(&$query)
    {
        if (App::make(AclService::class)->accessCreditReport()) {
            $CRPTQuery = PortfolioWatcher::withoutGlobalScopes()->select(
                'p.record_id',
                DB::raw('max(rpt.date_returned) AS max_date')
            )
                ->fromRaw('portfolio_watcher pw')
                ->join(DB::raw('portfolio p'), 'pw.record_id', '=', 'p.record_id')
                ->leftJoin(DB::raw('report rpt'), 'p.unique_id', '=', 'rpt.unique_id')
                ->where([
                    ['pw.user_id', '=', DB::raw("'" . App::make(AccountService::class)->currentWatcher() . "'")],
                    ['pw.active', '=', DB::raw("'1'")],
                    ['rpt.output_type', '=', DB::raw("'CR'")]
                ])
                ->groupBy('p.record_id');

            $query->leftJoinSub($CRPTQuery, 'CRPT', function ($join) {
                $join->on('watchlist.record_id', '=', 'CRPT.record_id');
            });
        }
        return $this;
    }

    private function appendAlertsNrSubQuery(&$query)
    {
        if (App::make(AclService::class)->accessNonFcraPublicRecord()) {
            $NRPTQuery = PortfolioWatcher::withoutGlobalScopes()->select(
                'p.record_id',
                DB::raw('max(rpt.date_returned) AS max_date')
            )
                ->fromRaw('portfolio_watcher pw')
                ->join(DB::raw('portfolio p'), 'pw.record_id', '=', 'p.record_id')
                ->leftJoin(DB::raw('report rpt'), 'p.unique_id', '=', 'rpt.unique_id')
                ->where([
                    ['pw.user_id', '=', DB::raw("'" . App::make(AccountService::class)->currentWatcher() . "'")],
                    ['pw.active', '=', DB::raw("'1'")],
                    ['rpt.output_type', '=', DB::raw("'NR'")]
                ])
                ->groupBy('p.record_id');

            $query->leftJoinSub($NRPTQuery, 'NRPT', function ($join) {
                $join->on('watchlist.record_id', '=', 'NRPT.record_id');
            });
        }
        return $this;
    }

    private function joinPrAlerts(&$query)
    {
        if (App::make(AclService::class)->accessPublicRecord()) {
            $query->leftJoin(DB::raw('report PRPT1'), function ($join) {
                $join->on('PRPT.max_date', '=', 'PRPT1.date_returned');
                $join->on('watchlist.unique_id', '=', 'PRPT1.unique_id');
                $join->on('PRPT1.output_type', '=', DB::raw("'PR'"));
            });
        }
        return $this;
    }

    private function joinCrAlerts(&$query)
    {
        if (App::make(AclService::class)->accessCreditReport()) {
            $query->leftJoin(DB::raw('report CRPT1'), function ($join) {
                $join->on('CRPT.max_date', '=', 'CRPT1.date_returned');
                $join->on('watchlist.unique_id', '=', 'CRPT1.unique_id');
                $join->on('CRPT1.output_type', '=', DB::raw("'CR'"));
            });
        }
        return $this;
    }

    private function joinNrAlerts(&$query)
    {
        if (App::make(AclService::class)->accessNonFcraPublicRecord()) {
            $query->leftJoin(DB::raw('report NRPT1'), function ($join) {
                $join->on('NRPT.max_date', '=', 'NRPT1.date_returned');
                $join->on('watchlist.unique_id', '=', 'NRPT1.unique_id');
                $join->on('NRPT1.output_type', '=', DB::raw("'NR'"));
            });
        }
        return $this;
    }

    private function appendAlertsViewedPr(&$query)
    {
        if (App::make(AclService::class)->accessPublicRecord()) {
            $leftJoinSubViewedPR = ReportWatcher::withoutGlobalScopes()->select(
                DB::raw('distinct rw.pr_report_id')
            )->fromRaw('report_watcher rw')
                ->where([
                    ['rw.user_id', '=', DB::raw("'" . App::make(AccountService::class)->currentWatcher() . "'")],
                    ['rw.status', '=', DB::raw("'Viewed'")],
                ]);

            $query->leftJoinSub($leftJoinSubViewedPR, 'VIEWED_PR', function ($join) {
                $join->on('PRPT1.report_id', '=', 'viewed_pr.pr_report_id');
            });
        }
        return $this;
    }

    private function appendAlertsViewedCr(&$query)
    {
        if (App::make(AclService::class)->accessCreditReport()) {
            $leftJoinSubViewedCR = ReportWatcher::withoutGlobalScopes()->select(
                DB::raw('distinct rw.cr_report_id')
            )->fromRaw('report_watcher rw')
                ->where([
                    ['rw.user_id', '=', DB::raw("'" . App::make(AccountService::class)->currentWatcher() . "'")],
                    ['rw.status', '=', DB::raw("'Viewed'")],
                ]);

            $query->leftJoinSub($leftJoinSubViewedCR, 'VIEWED_CR', function ($join) {
                $join->on('CRPT1.report_id', '=', 'viewed_cr.cr_report_id');
            });
        }
        return $this;
    }

    public function getSearchQuery($params = [])
    {
        $dbConn = $this->getConnection();
        $mainJoinSub = DB::connection($dbConn)->table('ret')->select(
            DB::raw('@n := if( unique_id = @prev_uid and output_type = @prev_type, @n + 1, 1) AS n'),
            DB::raw('@prev_uid := unique_id'),
            DB::raw('@prev_type := output_type'),
            'record_id',
            'unique_id',
            'name_last',
            'name_first',
            'lexid',
            'pf_status',
            'report_id',
            'date_added',
            'date_returned',
            'output_type',
            'user_id',
            'status'
        )->fromSub(
            Portfolio::withoutGlobalScopes()->select(
                'PFL.record_id',
                'PFL.unique_id',
                'PFL.name_last',
                'PFL.name_first',
                DB::raw('PFL.customer_key_2 as lexid'),
                DB::raw('PFL.status as pf_status'),
                'RPT.report_id',
                'RPT.date_added',
                'RPT.date_returned',
                'RPT.output_type',
                'PW.user_id',
                'RPT.status'
            )->fromRaw('portfolio PFL')
                ->leftJoin(DB::raw('report RPT'), function ($join) {
                    $allowedReports = implode(',', array_map(function ($type) {
                        return "'$type'";
                    }, App::make(AclService::class)->allowedReports()));
                    $join->on('PFL.unique_id', '=', 'RPT.unique_id')
                        ->whereRaw('RPT.output_type IN (' . $allowedReports . ')');
                })
                ->leftJoinSub(
                    PortfolioWatcher::withoutGlobalScopes()->select('user_id', 'record_id')
                        ->fromRaw('portfolio_watcher PW')
                        ->where([
                            ['PW.user_id', '=', DB::raw('"' . App::make(AccountService::class)->currentWatcher() . '"')],
                            ['PW.active', '=', DB::raw("'1'")]
                        ]),
                    'PW',
                    function ($join) {
                        $join->on('PFL.record_id', '=', 'PW.record_id');
                    }
                )
                ->where(function ($query) use ($params) {
                    $query->where($this->filters($params, 'PFL.'));

                    if (is_array($params) && count($params) > 0) {
                        if (empty($params['lexid']) === false) {
                            $query->orWhereIn('RPT.lexid', [LexIDFormatter::format($params['lexid']), $params['lexid']]);
                        }
                    }
                })
                ->orderByRaw('PFL.unique_id asc, RPT.output_type asc, RPT.date_returned desc'),
            'SUB_RET'
        );

        $mainQuery = Portfolio::withoutGlobalScopes()->select(
            'RET.record_id',
            'RET.unique_id',
            'RET.name_last',
            'RET.name_first',
            'RET.lexid',
            'RET.pf_status',
            'RET.report_id',
            'RET.date_added',
            'RET.date_returned',
            'RET.output_type',
            'RET.user_id',
            'RET.status'
        )
            ->fromRaw('( SELECT @prev_uid := \'\',@prev_type := \'\', @n := 0 ) init ')
            ->joinSub($mainJoinSub, 'RET', function ($join) {
            })
            ->whereRaw('n = 1')
            ->orderByRaw('RET.unique_id, RET.output_type');

        return $mainQuery;
    }

    public function historyQuery($params)
    {
        $historyQuery = Report::withoutGlobalScopes()->fromRaw('report r')
            ->select(
                'r.report_id',
                'r.unique_id',
                'r.lexid',
                'r.output_type',
                'r.status',
                'r.date_added',
                'r.date_returned',
                'pf.name_first',
                'pf.name_last',
                'pf.status as pf_status'
            )->leftJoin(DB::raw('portfolio pf'), function ($join) {
                $join->on('r.unique_id', '=', 'pf.unique_id');
            })->where('r.unique_id', '=', $params['unique_id'])
            ->whereIn('r.output_type', App::make(AclService::class)->allowedReports())
            ->orderBy('r.date_returned', 'desc');

        $employeeId = App::make(AccountService::class)->employeeId();

        if ($employeeId) {
            $historyQuery->where('r.lexid', '<>', $employeeId);
        }

        return $historyQuery;
    }

    public function reportsQuery($params = [])
    {
        $activeUser = DB::raw("'" . App::make(AccountService::class)->currentWatcher() . "'");
        $employeeId = DB::raw("'" . App::make(AccountService::class)->employeeId() . "'");

        $portfolioWatcherQuery = PortfolioWatcher::withoutGlobalScopes()->select(
            'pw.user_id',
            'pw.start_date',
            'p.record_id',
            'p.unique_id',
            'p.customer_key_2',
            'p.name_first',
            'p.name_last',
            'p.status'
        )
        ->fromRaw('portfolio_watcher pw')
        ->join(DB::raw('portfolio p'), 'pw.record_id', '=', 'p.record_id')
        ->where([
            ['pw.user_id', '=', $activeUser],
            ['pw.active', '=', DB::raw("'1'")],
            ['p.customer_key_2', '<>', DB::raw('LPAD(12, 0, ' . $employeeId . ')')]
        ]);

        $mainReportsQuery = ReportWatcher::withoutGlobalScopes()->select($this->reportsQueryColumns())
            ->fromSub($portfolioWatcherQuery, 'watchlist');
        // Join sub queries for PR
        $this->appendReportsPrSubQuery($mainReportsQuery)
        // Join sub queries for CR
            ->appendReportsCrSubQuery($mainReportsQuery)
        // Join sub queries for NR
            ->appendReportsNrSubQuery($mainReportsQuery)
        // Join with specific report types
            ->joinPrReports($mainReportsQuery)
            ->joinCrReports($mainReportsQuery)
            ->joinNrReports($mainReportsQuery)
        // Join to get viewed reports
            ->appendReportsViewedPr($mainReportsQuery)
            ->appendReportsViewedCr($mainReportsQuery);

        return $mainReportsQuery;
    }

    public function filters($params, $prefix = '', $exclude = [])
    {
        $filters = [];
        if (is_array($params) && count($params) > 0) {
            if (empty($params['first_name']) === false) {
                $filters[] = [$prefix . 'name_first', 'LIKE', "{$params['first_name']}%"];
            }

            if (empty($params['middle_name']) === false) {
                $filters[] = [$prefix . 'name_middle', 'LIKE', "{$params['middle_name']}%"];
            }

            if (empty($params['last_name']) === false) {
                $filters[] = [$prefix . 'name_last', 'LIKE', "{$params['last_name']}%"];
            }

            if (empty($params['street_address']) === false) {
                $filters[] = [$prefix . 'address_1', '=', $params['street_address']];
            }

            if (empty($params['city']) === false) {
                $filters[] = [$prefix . 'city', '=', $params['city']];
            }

            if (empty($params['state']) === false) {
                $filters[] = [$prefix . 'state', '=', $params['state']];
            }

            if (empty($params['zipcode']) === false) {
                $filters[] = [$prefix . 'zip', '=', $params['zipcode']];
            }

            if (empty($params['ssn']) === false) {
                $filters[] = [$prefix . 'ssn', '=', $params['ssn']];
            }

            if (empty($params['dob']) === false) {
                $dob = Carbon::parse($params['dob']);

                if ($dob) {
                    $filters[] = [$prefix . 'dob', '=', $dob->format('Ymd')];
                }
            }

            if (empty($params['lexid']) === false) {
                $filters[] = [$prefix . 'customer_key_2', '=', LexIDFormatter::format($params['lexid'])];
            }

            if (empty($params['id']) === false) {
                $filters[] = [$prefix . 'unique_id', '=', $params['id']];
            }

            if (empty($params['historyId']) === false && empty($params['type']) === false && $prefix === 'PFL.') {
                $allowedReports = App::make(AclService::class)->allowedReports();
                if (in_array($params['type'], $allowedReports)) {
                    switch (strtoupper($params['type'])) {
                        case ReportTypesConstant::PUBLIC_RECORD:
                            $filters[] = ['PRPT.report_id', '=', $params['historyId']];
                            break;
                        case ReportTypesConstant::CREDIT_REPORT:
                            $filters[] = ['CRPT.report_id', '=', $params['historyId']];
                            break;
                        case ReportTypesConstant::NONFCRA_PUBLIC_RECORD:
                            $filters[] = ['NRPT.report_id', '=', $params['historyId']];
                            break;
                    }
                }
            }


            if (empty($params['date_range']) === false && array_search('date_range', $exclude) === false) {
                switch ($params['date_range']) {
                    case 'all':
                        break;
                    case 'yesterday':
                        $startYesterday = Carbon::yesterday()->startOfDay();
                        $endYesterday = Carbon::yesterday()->endOfDay();

                        $filters[] = ['PRPT.' . 'date_returned', '>=', (string) $startYesterday];
                        $filters[] = ['CRPT.' . 'date_returned', '>=', (string) $startYesterday];
                        $filters[] = ['PRPT.' . 'date_returned', '<=', (string) $endYesterday];
                        $filters[] = ['CRPT.' . 'date_returned', '<=', (string) $endYesterday];

                        break;
                    case 'last-week':
                        $startOfWeek = Carbon::now()->subWeek()->startOfWeek();
                        $endOfWeek = Carbon::now()->subWeek()->endOfWeek();

                        $filters[] = ['PRPT.' . 'date_returned', '>=', (string) $startOfWeek];
                        $filters[] = ['CRPT.' . 'date_returned', '>=', (string) $startOfWeek];
                        $filters[] = ['PRPT.' . 'date_returned', '<=', (string) $endOfWeek];
                        $filters[] = ['CRPT.' . 'date_returned', '<=', (string) $endOfWeek];

                        break;
                    case 'past-2weeks':
                        $startOfWeek = Carbon::now()->subWeeks(2)->startOfWeek();
                        $endOfWeek = Carbon::now()->subWeek()->endOfWeek();

                        $filters[] = ['PRPT.' . 'date_returned', '>=', (string) $startOfWeek];
                        $filters[] = ['CRPT.' . 'date_returned', '>=', (string) $startOfWeek];
                        $filters[] = ['PRPT.' . 'date_returned', '<=', (string) $endOfWeek];
                        $filters[] = ['CRPT.' . 'date_returned', '<=', (string) $endOfWeek];

                        break;
                    case 'last-month':
                        $startOfMonth = Carbon::now()->subMonth()->startOfMonth();
                        $endOfMonth = Carbon::now()->subMonth()->endOfMonth();

                        $filters[] = ['PRPT.' . 'date_returned', '>=', (string) $startOfMonth];
                        $filters[] = ['CRPT.' . 'date_returned', '>=', (string) $startOfMonth];
                        $filters[] = ['PRPT.' . 'date_returned', '<=', (string) $endOfMonth];
                        $filters[] = ['CRPT.' . 'date_returned', '<=', (string) $endOfMonth];

                        break;

                    case 'custom':
                        if (empty($params['start_date']) === false && empty($params['end_date']) === false) {
                            $startDate = Carbon::parse($params['start_date'])->startOfDay();
                            $endDate = Carbon::parse($params['end_date'])->endOfDay();

                            $filters[] = ['PRPT.' . 'date_returned', '>=', (string) $startDate];
                            $filters[] = ['CRPT.' . 'date_returned', '>=', (string) $startDate];
                            $filters[] = ['PRPT.' . 'date_returned', '<=', (string) $endDate];
                            $filters[] = ['CRPT.' . 'date_returned', '<=', (string) $endDate];
                        }
                        break;
                    default:
                        break;
                }
            }
        }
        return $filters;
    }

    public function sortBy($by, $cols = [])
    {
        $sortParams = [
            'identity' => 'unique_id',
            'record_id' => 'record_id',
            'unique_id' => 'unique_id',
            'name_first' => 'name_first',
            'name_last' => 'name_last',
            'pf_status' => 'status',
            'lexid' => 'lexid',
            'watcher' => 'user_id',
            'max_pr_date' => 'max_pr_date',
            'max_cr_date' => 'max_cr_date',
            'max_nr_date' => 'max_nr_date',
            'report_date' => 'report_date',
            'pr_status' => 'status',
            'cr_status' => 'status',
            'pr_id' => 'report_id',
            'cr_id' => 'report_id',
        ];

        return strtr($by, (count($cols) ? $cols : $sortParams));
    }

    public function setSorting(&$resultsQuery, $params, $columns = [])
    {
        if (empty($params['sortBy']) === false && $sortableCol = $this->sortBy($params['sortBy'], $columns)) {
            // check for virtual columns
            if ($sortableCol !== 'report_date') {
                $resultsQuery->orderBy($sortableCol, $params['sortDir'] ?? 'desc');
            }
        } else {
            if (App::make(AclService::class)->accessPublicRecord()) {
                $resultsQuery->orderBy('PRPT.date_returned', 'desc');
            }
            if (App::make(AclService::class)->accessCreditReport()) {
                $resultsQuery->orderBy('CRPT.date_returned', 'desc');
            }
        }
    }

    public function numReportsQuery()
    {
        $columns = [];
        if (App::make(AclService::class)->accessPublicRecord()) {
            array_push($columns, DB::raw('SUM(reports.pr_alert) as num_pr_alerts'));
        }
        if (App::make(AclService::class)->accessCreditReport()) {
            array_push($columns, DB::raw('SUM(reports.cr_alert) as num_cr_alerts'));
        }
        if (!empty($columns)) {
            $alertsQuery = ReportWatcher::withoutGlobalScopes()->select($columns)
                            ->fromSub($this->reportsQuery(), 'reports');
            return $alertsQuery;
        }
        return null;
    }

    public function reportsResultsColumns(): array
    {
        $columns = [
            'start_date' => 'watchlist.start_date',
            'record_id' => 'watchlist.record_id',
            'unique_id' => 'watchlist.unique_id',
            'name_first' => 'watchlist.name_first',
            'name_last' => 'watchlist.name_last',
            'pf_status' => 'watchlist.status',
            'lexid' => 'watchlist.customer_key_2',
            'watcher' => 'watchlist.user_id',
        ];
        if (App::make(AclService::class)->accessPublicRecord()) {
            $columns = array_merge($columns, [
                'max_pr_date' => 'PRPT1.date_returned',
                'pr_status' => 'PRPT1.status',
                'pr_id' => 'PRPT1.report_id',
            ]);
        }
        if (App::make(AclService::class)->accessCreditReport()) {
            $columns = array_merge($columns, [
                'max_cr_date' => 'CRPT1.date_returned',
                'cr_status' => 'CRPT1.status',
                'cr_id' => 'CRPT1.report_id',
            ]);
        }
        return $columns;
    }

    private function reportsQueryColumns(): array
    {
        $columns = [
            DB::raw('watchlist.user_id as watcher'),
            'watchlist.start_date',
            'watchlist.record_id',
            'watchlist.unique_id',
            DB::raw('watchlist.customer_key_2 as lexid'),
            'watchlist.name_first',
            'watchlist.name_last',
            'watchlist.status',
            DB::raw('watchlist.status as pf_status'),
        ];
        if (App::make(AclService::class)->accessPublicRecord()) {
            $columns = array_merge($columns, [
                DB::raw('PRPT1.report_id as pr_id'),
                DB::raw('PRPT1.status as pr_status'),
                DB::raw('PRPT.max_date AS max_pr_date'),
                DB::raw('VIEWED_PR.pr_report_id'),
                DB::raw('CASE WHEN VIEWED_PR.pr_report_id IS NULL AND PRPT.max_date > watchlist.start_date THEN 1 ELSE 0 END AS pr_alert'),
            ]);
        }
        if (App::make(AclService::class)->accessCreditReport()) {
            $columns = array_merge($columns, [
                DB::raw('CRPT1.report_id as cr_id'),
                DB::raw('CRPT1.status as cr_status'),
                DB::raw('CRPT.max_date AS max_cr_date'),
                DB::raw('VIEWED_CR.cr_report_id'),
                DB::raw('CASE WHEN VIEWED_CR.cr_report_id IS NULL AND CRPT.max_date > watchlist.start_date THEN 1 ELSE 0 END AS cr_alert')
            ]);
        }
        if (App::make(AclService::class)->accessNonFcraPublicRecord()) {
            $columns = array_merge($columns, [
                DB::raw('NRPT1.report_id as nr_id'),
                DB::raw('NRPT1.status as nr_status'),
                DB::raw('NRPT.max_date AS max_nr_date'),
            ]);
        }
        return $columns;
    }

    private function appendReportsPrSubQuery(&$query)
    {
        if (App::make(AclService::class)->accessPublicRecord()) {
            $PRPTQuery = PortfolioWatcher::withoutGlobalScopes()->select(
                'p.record_id',
                DB::raw('max(rpt.date_returned) AS max_date')
            )
                ->fromRaw('portfolio_watcher pw')
                ->join(DB::raw('portfolio p'), 'pw.record_id', '=', 'p.record_id')
                ->leftJoin(DB::raw('report rpt'), 'p.unique_id', '=', 'rpt.unique_id')
                ->where([
                    ['pw.user_id', '=', DB::raw("'" . App::make(AccountService::class)->currentWatcher() . "'")],
                    ['pw.active', '=', DB::raw("'1'")],
                    ['rpt.output_type', '=', DB::raw("'PR'")]
                ])
                ->groupBy('p.record_id');

            $query->leftJoinSub($PRPTQuery, 'PRPT', function ($join) {
                $join->on('watchlist.record_id', '=', 'PRPT.record_id');
            });
        }
        return $this;
    }

    private function appendReportsCrSubQuery(&$query)
    {
        if (App::make(AclService::class)->accessCreditReport()) {
            $CRPTQuery = PortfolioWatcher::withoutGlobalScopes()->select(
                'p.record_id',
                DB::raw('max(rpt.date_returned) AS max_date')
            )
                ->fromRaw('portfolio_watcher pw')
                ->join(DB::raw('portfolio p'), 'pw.record_id', '=', 'p.record_id')
                ->leftJoin(DB::raw('report rpt'), 'p.unique_id', '=', 'rpt.unique_id')
                ->where([
                    ['pw.user_id', '=', DB::raw("'" . App::make(AccountService::class)->currentWatcher() . "'")],
                    ['pw.active', '=', DB::raw("'1'")],
                    ['rpt.output_type', '=', DB::raw("'CR'")]
                ])
                ->groupBy('p.record_id');

            $query->leftJoinSub($CRPTQuery, 'CRPT', function ($join) {
                $join->on('watchlist.record_id', '=', 'CRPT.record_id');
            });
        }
        return $this;
    }

    private function appendReportsNrSubQuery(&$query)
    {
        if (App::make(AclService::class)->accessNonFcraPublicRecord()) {
            $NRPTQuery = PortfolioWatcher::withoutGlobalScopes()->select(
                'p.record_id',
                DB::raw('max(rpt.date_returned) AS max_date')
            )
                ->fromRaw('portfolio_watcher pw')
                ->join(DB::raw('portfolio p'), 'pw.record_id', '=', 'p.record_id')
                ->leftJoin(DB::raw('report rpt'), 'p.unique_id', '=', 'rpt.unique_id')
                ->where([
                    ['pw.user_id', '=', DB::raw("'" . App::make(AccountService::class)->currentWatcher() . "'")],
                    ['pw.active', '=', DB::raw("'1'")],
                    ['rpt.output_type', '=', DB::raw("'NR'")]
                ])
                ->groupBy('p.record_id');

            $query->leftJoinSub($NRPTQuery, 'NRPT', function ($join) {
                $join->on('watchlist.record_id', '=', 'NRPT.record_id');
            });
        }
        return $this;
    }

    private function joinPrReports(&$query)
    {
        if (App::make(AclService::class)->accessPublicRecord()) {
            $query->leftJoin(DB::raw('report PRPT1'), function ($join) {
                $join->on('PRPT.max_date', '=', 'PRPT1.date_returned');
                $join->on('watchlist.unique_id', '=', 'PRPT1.unique_id');
                $join->on('PRPT1.output_type', '=', DB::raw("'PR'"));
            });
        }
        return $this;
    }

    private function joinCrReports(&$query)
    {
        if (App::make(AclService::class)->accessCreditReport()) {
            $query->leftJoin(DB::raw('report CRPT1'), function ($join) {
                $join->on('CRPT.max_date', '=', 'CRPT1.date_returned');
                $join->on('watchlist.unique_id', '=', 'CRPT1.unique_id');
                $join->on('CRPT1.output_type', '=', DB::raw("'CR'"));
            });
        }
        return $this;
    }

    private function joinNrReports(&$query)
    {
        if (App::make(AclService::class)->accessNonFcraPublicRecord()) {
            $query->leftJoin(DB::raw('report NRPT1'), function ($join) {
                $join->on('NRPT.max_date', '=', 'NRPT1.date_returned');
                $join->on('watchlist.unique_id', '=', 'NRPT1.unique_id');
                $join->on('NRPT1.output_type', '=', DB::raw("'NR'"));
            });
        }
        return $this;
    }

    private function appendReportsViewedPr(&$query)
    {
        if (App::make(AclService::class)->accessPublicRecord()) {
            $leftJoinSubViewedPR = ReportWatcher::withoutGlobalScopes()->select(
                DB::raw('distinct rw.pr_report_id')
            )->fromRaw('report_watcher rw')
                ->where([
                    ['rw.user_id', '=', DB::raw("'" . App::make(AccountService::class)->currentWatcher() . "'")],
                    ['rw.status', '=', DB::raw("'Viewed'")],
                ]);

            $query->leftJoinSub($leftJoinSubViewedPR, 'VIEWED_PR', function ($join) {
                $join->on('PRPT1.report_id', '=', 'viewed_pr.pr_report_id');
            });
        }
        return $this;
    }

    private function appendReportsViewedCr(&$query)
    {
        if (App::make(AclService::class)->accessCreditReport()) {
            $leftJoinSubViewedCR = ReportWatcher::withoutGlobalScopes()->select(
                DB::raw('distinct rw.cr_report_id')
            )->fromRaw('report_watcher rw')
                ->where([
                    ['rw.user_id', '=', DB::raw("'" . App::make(AccountService::class)->currentWatcher() . "'")],
                    ['rw.status', '=', DB::raw("'Viewed'")],
                ]);

            $query->leftJoinSub($leftJoinSubViewedCR, 'VIEWED_CR', function ($join) {
                $join->on('CRPT1.report_id', '=', 'viewed_cr.cr_report_id');
            });
        }
        return $this;
    }
}
