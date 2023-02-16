<?php

namespace App\Modules\Search\Type\CreditReport;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;
use data_get;
use Illuminate\Support\Collection;
use Carbon\Carbon;
use App\Services\Report\ReportsService;
use App\Services\Report\ReportTypesConstant;
use Illuminate\Support\Facades\App;
use App\Services\Common\ProductModules;
use App\Services\User\AccountService;

class CreditRecordReportType extends GraphQLType
{
    public function __construct(ReportsService $reportsService)
    {
        $this->reportsService = $reportsService;
    }

    protected $attributes = [
        'name' => 'CreditRecordReport',
        'description' => 'Credit Record Report',
    ];

    public function fields(): array
    {
        return [
            'ReportDate' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value, $args) {
                    return $this->reportsService->getReportDate($value['ReportRef'] ?? null, ReportTypesConstant::CREDIT_REPORT);
                }
            ],
            'ReportStatus' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value, $args) {
                    return $value['ReportRef']->cr_status ?? null;
                }
            ],
            'Notes' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'BorrowerSubject' => [
                'type' => Graphql::type('BorrowerSubject'),
                'description' => '',
                'resolve' => function ($value) {
                    $borrower = data_get($value, '#document.RESPONSE_GROUP.RESPONSE.RESPONSE_DATA.CREDIT_RESPONSE.BORROWER', null);
                    return $borrower;
                }
            ],
            'PoID' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    $data = data_get($value, '#document.RESPONSE_GROUP.RESPONSE.KEY', []);

                    $final_keys = [];

                    foreach ($data as $key) {
                        if (empty($key['attributes'] === false)) {
                            if (empty($key['attributes']['Name']) === false && empty($key['attributes']['Value']) === false) {
                                $final_keys[ $key['attributes']['Name'] ]  =  $key['attributes']['Value'];
                            }
                        }
                    }

                    return $final_keys['p.o. id'] ?? null;
                }
            ],
            'CaseNumber' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    $data = data_get($value, '#document.RESPONSE_GROUP.RESPONSE.KEY', []);

                    $final_keys = [];

                    foreach ($data as $key) {
                        if (empty($key['attributes'] === false)) {
                            if (empty($key['attributes']['Name']) === false && empty($key['attributes']['Value']) === false) {
                                $final_keys[ $key['attributes']['Name'] ]  =  $key['attributes']['Value'];
                            }
                        }
                    }

                    return data_get(
                        $final_keys,
                        'CASE_NUMBER',
                        data_get($final_keys, 'CASENUMBER', null)
                    );
                }
            ],
            'Keys' => [
                'type' => Graphql::type('CreditReportKeys'),
                'description' => '',
                'resolve' => function ($value) {
                    $data = data_get($value, '#document.RESPONSE_GROUP.RESPONSE.KEY', []);

                    $final_keys = [];

                    foreach ($data as $key) {
                        if (empty($key['attributes'] === false)) {
                            if (empty($key['attributes']['Name']) === false && isset($key['attributes']['Value']) === true) {
                                $final_keys[ $key['attributes']['Name'] ]  =  $key['attributes']['Value'];
                            }
                        }
                    }

                    return $final_keys;
                }
            ],
            'SubjectInformation' => [
                'type' => GraphQL::type('SubjectInformation'),
                'description' => '',
                'resolve' => function ($value) {
                    return $value->SubjectInformation ?? null;
                }
            ],
            'CreditFile' => [
                'type' => Type::listOf(GraphQL::type('CreditFile')),
                'description' => '',
                'resolve' => function ($value) {
                    $creditFile = data_get($value, '#document.RESPONSE_GROUP.RESPONSE.RESPONSE_DATA.CREDIT_RESPONSE.CREDIT_FILE', []);
                    $files = [];
                    foreach ($creditFile as $id => $file) {
                        if (empty($file['BORROWER']) === false) {
                            $files[$id] = $file;
                        }
                    }
                    return $files;
                }
            ],
            'CreditCode' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    $data = data_get($value, '#document.RESPONSE_GROUP.RESPONSE.KEY', []);

                    $final_keys = [];

                    foreach ($data as $key) {
                        if (empty($key['attributes'] === false)) {
                            if (empty($key['attributes']['Name']) === false && empty($key['attributes']['Value']) === false) {
                                $final_keys[ $key['attributes']['Name'] ]  =  $key['attributes']['Value'];
                            }
                        }
                    }

                    return data_get(
                        $final_keys,
                        'OPM_SCORE_CODE',
                        data_get($final_keys, 'OPMSCORING', null)
                    );
                }
            ],
            'NoHitFlag' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    $data = data_get($value, '#document.RESPONSE_GROUP.RESPONSE.KEY', []);

                    $final_keys = [];

                    foreach ($data as $key) {
                        if (empty($key['attributes'] === false)) {
                            if (empty($key['attributes']['Name']) === false && empty($key['attributes']['Value']) === false) {
                                $final_keys[ $key['attributes']['Name'] ]  =  $key['attributes']['Value'];
                            }
                        }
                    }

                    return data_get($final_keys, 'NOHIT_CREDIT_FILES', '');
                }
            ],
            'ReportsCombined' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    $indicators = [
                        'EquifaxIndicator', 'ExperianIndicator', 'TransUnionIndicator'
                    ];

                    $creditRepository = data_get($value, '#document.RESPONSE_GROUP.RESPONSE.RESPONSE_DATA.CREDIT_RESPONSE.CREDIT_REPOSITORY_INCLUDED.attributes', null);

                    $countReports = 0;

                    if ($creditRepository) {
                        foreach ($creditRepository as $repository => $included_report) {
                            if (in_array($repository, $indicators) && $included_report === 'Y') {
                                $countReports++;
                            }
                        }
                    }

                    return $countReports;
                }
            ],
            'CreditBureau' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    $indicators = [
                        'EquifaxIndicator', 'ExperianIndicator', 'TransUnionIndicator'
                    ];

                    $creditRepository = data_get($value, '#document.RESPONSE_GROUP.RESPONSE.RESPONSE_DATA.CREDIT_RESPONSE.CREDIT_REPOSITORY_INCLUDED.attributes', null);

                    $bureaus = [];

                    if ($creditRepository) {
                        foreach ($creditRepository as $repository => $included_report) {
                            if (in_array($repository, $indicators) && $included_report === 'Y') {
                                $bureaus[] = str_replace('Indicator', '', $repository);
                            }
                        }
                    }

                    return implode(', ', $bureaus);
                }
            ],
            'TradesCount' => [
                'type' => Type::listOf(Type::string()),
                'description' => '',
                'resolve' => function ($value) {
                    $trades = data_get($value, '#document.RESPONSE_GROUP.RESPONSE.RESPONSE_DATA.CREDIT_RESPONSE.CREDIT_LIABILITY.CURRENT_RATING.attributes.Code', null);

                    if (!$trades) {
                        return null;
                    }

                    $result_trades = [];

                    foreach ($trades as $trade) {
                        if (empty($result_trades[$trade]) === false) {
                            $result_trades[$trade]++;
                        } else {
                            $result_trades[$trade] = 1;
                        }
                    }

                    $result_strings = [];

                    foreach ($result_trades as $rating => $count) {
                        $result_strings[] = "(highest rating of " . $rating . " applies to " . $count . " trades.)";
                    }

                    return $result_strings;
                }
            ],
            'Inquiries' => [
                'type' => Type::listOf(GraphQL::type('CreditInquiry')),
                'description' => '',
                'resolve' => function ($value) {
                    $inquiries = data_get($value, '#document.RESPONSE_GROUP.RESPONSE.RESPONSE_DATA.CREDIT_RESPONSE.CREDIT_INQUIRY', []);

                    return $inquiries;
                }
            ],
            'NumberInquiries' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    $inquiries = data_get($value, '#document.RESPONSE_GROUP.RESPONSE.RESPONSE_DATA.CREDIT_RESPONSE.CREDIT_INQUIRY', null);

                    return $inquiries ? count($inquiries) : 0;
                }
            ],
            'Trades' => [
                'type' => Type::listOf(GraphQL::type('CreditTrades')),
                'description' => '',
                'resolve' => function ($value) {
                    $trades = data_get($value, '#document.RESPONSE_GROUP.RESPONSE.RESPONSE_DATA.CREDIT_RESPONSE.CREDIT_LIABILITY', []);
                    $trades_refs = data_get($value, '#document.RESPONSE_GROUP.RESPONSE.RESPONSE_DATA.CREDIT_RESPONSE.CREDIT_TRADE_REFERENCE', []);

                    $results = new Collection();

                    if ($trades) {
                        foreach ($trades as $ref => $trade) {
                            if (isset($trade['CreditTradeReferenceID'])) {
                                if (isset($trades_refs[ $trade['CreditTradeReferenceID'] ])) {
                                    $trade = array_merge($trade, $trades_refs[ $trade['CreditTradeReferenceID'] ]);
                                    $trade['ReportRef'] = $value['ReportRef'];
                                }

                                $results->add($trade);
                            }
                        }

                        if (App::make(AccountService::class)->activeModule() !== ProductModules::FBI) {
                            $results = $results->whereNotIn('CreditBusinessType', ['Collection', 'CollectionServices']);
                        }

                        $sortedResults = $results->sortBy([
                            ['DerogatoryDataIndicator', 'desc'],
                            ['LastActivityDate', 'desc'],
                        ]);

                        return $sortedResults->values()->all();
                    }
                    return $results->toArray();
                }
            ],
            'Collections' => [
                'type' => Type::listOf(GraphQL::type('CreditCollections')),
                'description' => '',
                'resolve' => function ($value) {
                    $trades = data_get($value, '#document.RESPONSE_GROUP.RESPONSE.RESPONSE_DATA.CREDIT_RESPONSE.CREDIT_LIABILITY', []);
                    $trades_refs = data_get($value, '#document.RESPONSE_GROUP.RESPONSE.RESPONSE_DATA.CREDIT_RESPONSE.CREDIT_TRADE_REFERENCE', []);

                    $results = new Collection();

                    if ($trades) {
                        foreach ($trades as $ref => $trade) {
                            if (isset($trade['CreditTradeReferenceID'])) {
                                if (isset($trades_refs[ $trade['CreditTradeReferenceID'] ])) {
                                    $trade = array_merge($trade, $trades_refs[ $trade['CreditTradeReferenceID'] ]);
                                }

                                $results->add($trade);
                            }
                        }

                        $resultsCollections = $results->whereIn('CreditBusinessType', ['Collection', 'CollectionServices']);

                        return $resultsCollections->values()->all();
                    }
                    return $results->toArray();
                }
            ],
            'PublicRecords' => [
                'type' => Type::listOf(GraphQL::type('CreditPublicRecord')),
                'description' => '',
                'resolve' => function ($value) {
                    $records = data_get($value, '#document.RESPONSE_GROUP.RESPONSE.RESPONSE_DATA.CREDIT_RESPONSE.CREDIT_PUBLIC_RECORD', []);
                    $trades_references = data_get($value, '#document.RESPONSE_GROUP.RESPONSE.RESPONSE_DATA.CREDIT_RESPONSE.CREDIT_LIABILITY', []);
                    $responseDateTime = data_get($value, '#document.RESPONSE_GROUP.RESPONSE.attributes.ResponseDateTime');

                    if ($records && is_array($records)) {
                        foreach ($records as $key => $record) {
                            if (empty($record['CreditTradeReferenceID']) === false) {
                                $referenceId = str_replace('PRID', 'TRID', $record['CreditTradeReferenceID']);
                                $trade_ref = $trades_references[$referenceId] ?? null;
                                if ($trade_ref) {
                                    $address = $trade_ref['CREDITOR'] ?? null;
                                    if ($address && empty($address['StreetAddress']) === false) {
                                        $records[$key]['Address'] = ($address['StreetAddress'] ?? '') . ' ' .
                                                                    ($address['City'] ?? '') . ', ' .
                                                                    ($address['State'] ?? '') . ' ' .
                                                                    ($address['PostalCode'] ?? '');
                                    }
                                    $address = null;

                                    $records[$key]['AccountPaidDate'] = $trade_ref['AccountPaidDate'] ?? null;
                                    $records[$key]['AccountOpenedDate'] = $trade_ref['AccountOpenedDate'] ?? null;
                                    $records[$key]['LastActivityDate'] = $trade_ref['LastActivityDate'] ?? null;
                                }
                            }

                            if ($responseDateTime) {
                                $parsedDateTime = Carbon::parse($responseDateTime);
                                if ($parsedDateTime->isValid()) {
                                    $records[$key]['TimeReportProcessed'] = $parsedDateTime->toTimeString();
                                    $records[$key]['DateReportProcessed'] = $parsedDateTime->toDateString();
                                }
                            }
                        }
                    }

                    return $records;
                }
            ],
            'CreditConsumerReferral' => [
                'type' => GraphQL::type('CreditConsumerReferral'),
                'description' => '',
                'resolve' => function ($value) {
                    $consumer = data_get($value, '#document.RESPONSE_GROUP.RESPONSE.RESPONSE_DATA.CREDIT_RESPONSE.CREDIT_CONSUMER_REFERRAL');
                    if ($consumer && is_array($consumer)) {
                        if (empty($consumer[0]) === false) {
                            return $consumer[0]['attributes'] ?? null;
                        }
                    }
                    return $consumer;
                }
            ],
            'CreditPercentUtilization' => [
                'type' => Type::float(),
                'description' => '',
                'resolve' => function ($value) {
                    $data = data_get($value, '#document.RESPONSE_GROUP.RESPONSE.KEY', []);

                    $final_keys = [];

                    foreach ($data as $key) {
                        if (empty($key['attributes'] === false)) {
                            if (empty($key['attributes']['Name']) === false && empty($key['attributes']['Value']) === false) {
                                $final_keys[ $key['attributes']['Name'] ]  =  $key['attributes']['Value'];
                            }
                        }
                    }

                    $total_balance = data_get($final_keys, 'TRADELINE_TOTAL_BALANCE', 0);
                    $credit_limit = data_get($final_keys, 'TRADELINE_TOTAL_CREDIT_LIMIT', 0);

                    $percent_utilization = $total_balance > 0 && $credit_limit > 0 ? ($total_balance / $credit_limit) * 100 : 0;

                    return $percent_utilization;
                }
            ],
            'TotalPaymentAmount' => [
                'type' => Type::float(),
                'description' => '',
                'resolve' => function ($value) {
                    $trades = data_get($value, '#document.RESPONSE_GROUP.RESPONSE.RESPONSE_DATA.CREDIT_RESPONSE.CREDIT_LIABILITY', []);
                    $trades_refs = data_get($value, '#document.RESPONSE_GROUP.RESPONSE.RESPONSE_DATA.CREDIT_RESPONSE.CREDIT_TRADE_REFERENCE', []);

                    $monthlyPaymentAmount = [];

                    if ($trades) {
                        foreach ($trades as $ref => $trade) {
                            if (isset($trade['CreditTradeReferenceID'])) {
                                if (isset($trades_refs[ $trade['CreditTradeReferenceID'] ])) {
                                    $trade = array_merge($trade, $trades_refs[ $trade['CreditTradeReferenceID'] ]);
                                    $monthlyPaymentAmount[] = $trade['MonthlyPaymentAmount'] ?? 0;
                                }
                            }
                        }
                    }
                    return round(array_sum($monthlyPaymentAmount), 2);
                }
            ],
            'TotalBalance' => [
                'type' => Type::float(),
                'description' => '',
                'resolve' => function ($value) {
                    $data = data_get($value, '#document.RESPONSE_GROUP.RESPONSE.KEY', []);

                    $final_keys = [];

                    foreach ($data as $key) {
                        if (empty($key['attributes'] === false)) {
                            if (empty($key['attributes']['Name']) === false && empty($key['attributes']['Value']) === false) {
                                $final_keys[ $key['attributes']['Name'] ]  =  $key['attributes']['Value'];
                            }
                        }
                    }

                    return data_get($final_keys, 'TRADELINE_TOTAL_BALANCE', 0);
                }
            ],
            'TotalAmountPastDue' => [
                'type' => Type::float(),
                'description' => '',
                'resolve' => function ($value) {
                    $data = data_get($value, '#document.RESPONSE_GROUP.RESPONSE.KEY', []);

                    $final_keys = [];

                    foreach ($data as $key) {
                        if (empty($key['attributes'] === false)) {
                            if (empty($key['attributes']['Name']) === false && empty($key['attributes']['Value']) === false) {
                                $final_keys[ $key['attributes']['Name'] ]  =  $key['attributes']['Value'];
                            }
                        }
                    }

                    return data_get($final_keys, 'TRADELINE_TOTAL_PAST_DUE', 0);
                }
            ],
            'TradesInstallment' => [
                'type' => Type::int(),
                'description' => '',
                'resolve' => function ($value) {
                    $trades = data_get($value, '#document.RESPONSE_GROUP.RESPONSE.RESPONSE_DATA.CREDIT_RESPONSE.CREDIT_LIABILITY', []);
                    $trades_refs = data_get($value, '#document.RESPONSE_GROUP.RESPONSE.RESPONSE_DATA.CREDIT_RESPONSE.CREDIT_TRADE_REFERENCE', []);

                    $count = 0;

                    if ($trades) {
                        foreach ($trades as $ref => $trade) {
                            if (isset($trade['CreditTradeReferenceID'])) {
                                if (isset($trades_refs[ $trade['CreditTradeReferenceID'] ])) {
                                    $trade = array_merge($trade, $trades_refs[ $trade['CreditTradeReferenceID'] ]);
                                    if (empty($trade['AccountType']) === false && $trade['AccountType'] === 'Installment') {
                                        $count++;
                                    }
                                }
                            }
                        }
                    }
                    return $count;
                }
            ],
            'TradesRevolving' => [
                'type' => Type::int(),
                'description' => '',
                'resolve' => function ($value) {
                    $trades = data_get($value, '#document.RESPONSE_GROUP.RESPONSE.RESPONSE_DATA.CREDIT_RESPONSE.CREDIT_LIABILITY', []);
                    $trades_refs = data_get($value, '#document.RESPONSE_GROUP.RESPONSE.RESPONSE_DATA.CREDIT_RESPONSE.CREDIT_TRADE_REFERENCE', []);

                    $count = 0;

                    if ($trades) {
                        foreach ($trades as $ref => $trade) {
                            if (isset($trade['CreditTradeReferenceID'])) {
                                if (isset($trades_refs[ $trade['CreditTradeReferenceID'] ])) {
                                    $trade = array_merge($trade, $trades_refs[ $trade['CreditTradeReferenceID'] ]);
                                    if (empty($trade['AccountType']) === false && $trade['AccountType'] === 'Revolving') {
                                        $count++;
                                    }
                                }
                            }
                        }
                    }
                    return $count;
                }
            ],
            'TradesMortgage' => [
                'type' => Type::int(),
                'description' => '',
                'resolve' => function ($value) {
                    $trades = data_get($value, '#document.RESPONSE_GROUP.RESPONSE.RESPONSE_DATA.CREDIT_RESPONSE.CREDIT_LIABILITY', []);
                    $trades_refs = data_get($value, '#document.RESPONSE_GROUP.RESPONSE.RESPONSE_DATA.CREDIT_RESPONSE.CREDIT_TRADE_REFERENCE', []);

                    $count = 0;

                    if ($trades) {
                        foreach ($trades as $ref => $trade) {
                            if (isset($trade['CreditTradeReferenceID'])) {
                                if (isset($trades_refs[ $trade['CreditTradeReferenceID'] ])) {
                                    $trade = array_merge($trade, $trades_refs[ $trade['CreditTradeReferenceID'] ]);
                                    if (empty($trade['AccountType']) === false && $trade['AccountType'] === 'Mortgage') {
                                        $count++;
                                    }
                                }
                            }
                        }
                    }
                    return $count;
                }
            ],
            'TradesOther' => [
                'type' => Type::int(),
                'description' => '',
                'resolve' => function ($value) {
                    $trades = data_get($value, '#document.RESPONSE_GROUP.RESPONSE.RESPONSE_DATA.CREDIT_RESPONSE.CREDIT_LIABILITY', []);
                    $trades_refs = data_get($value, '#document.RESPONSE_GROUP.RESPONSE.RESPONSE_DATA.CREDIT_RESPONSE.CREDIT_TRADE_REFERENCE', []);

                    $count = 0;
                    $types = [
                        'Installment',
                        'Revolving',
                        'Mortgage'
                    ];

                    if ($trades) {
                        foreach ($trades as $ref => $trade) {
                            if (isset($trade['CreditTradeReferenceID'])) {
                                if (isset($trades_refs[ $trade['CreditTradeReferenceID'] ])) {
                                    $trade = array_merge($trade, $trades_refs[ $trade['CreditTradeReferenceID'] ]);
                                    if (empty($trade['AccountType']) === false && in_array($trade['AccountType'], $types)  === false) {
                                        $count++;
                                    }
                                }
                            }
                        }
                    }
                    return $count;
                }
            ],
            'TimeReportProcessed' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    $responseDateTime = data_get($value, '#document.RESPONSE_GROUP.RESPONSE.attributes.ResponseDateTime');

                    if ($responseDateTime) {
                        $parsedDateTime = Carbon::parse($responseDateTime);
                        if ($parsedDateTime->isValid()) {
                            return $parsedDateTime->toTimeString();
                        }
                    }

                    return null;
                },
            ],
            'DateReportProcessed' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    $responseDateTime = data_get($value, '#document.RESPONSE_GROUP.RESPONSE.attributes.ResponseDateTime');

                    if ($responseDateTime) {
                        $parsedDateTime = Carbon::parse($responseDateTime);
                        if ($parsedDateTime->isValid()) {
                            return $parsedDateTime->toDateString();
                        }
                    }

                    return null;
                },
            ],
            'DateofFirstTradeline' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    $trades = data_get($value, '#document.RESPONSE_GROUP.RESPONSE.RESPONSE_DATA.CREDIT_RESPONSE.CREDIT_LIABILITY', []);
                    $trades_refs = data_get($value, '#document.RESPONSE_GROUP.RESPONSE.RESPONSE_DATA.CREDIT_RESPONSE.CREDIT_TRADE_REFERENCE', []);

                    $results = new Collection();

                    if ($trades) {
                        foreach ($trades as $ref => $trade) {
                            if (isset($trade['CreditTradeReferenceID'])) {
                                if (isset($trades_refs[ $trade['CreditTradeReferenceID'] ])) {
                                    $trade = array_merge($trade, $trades_refs[ $trade['CreditTradeReferenceID'] ]);
                                }

                                $results->add($trade);
                            }
                        }

                        $sortedResults = $results->sortBy([
                            ['AccountOpenedDate', 'asc'],
                        ]);

                        return $sortedResults->first()['AccountOpenedDate'] ?? null;
                    }
                    return null;
                }
            ],
            'DateofLastTradelineActivity' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    $trades = data_get($value, '#document.RESPONSE_GROUP.RESPONSE.RESPONSE_DATA.CREDIT_RESPONSE.CREDIT_LIABILITY', []);
                    $trades_refs = data_get($value, '#document.RESPONSE_GROUP.RESPONSE.RESPONSE_DATA.CREDIT_RESPONSE.CREDIT_TRADE_REFERENCE', []);

                    $results = new Collection();

                    if ($trades) {
                        foreach ($trades as $ref => $trade) {
                            if (isset($trade['CreditTradeReferenceID'])) {
                                if (isset($trades_refs[ $trade['CreditTradeReferenceID'] ])) {
                                    $trade = array_merge($trade, $trades_refs[ $trade['CreditTradeReferenceID'] ]);
                                }

                                $results->add($trade);
                            }
                        }

                        $sortedResults = $results->sortBy([
                            ['LastActivityDate', 'desc'],
                        ]);

                        return $sortedResults->first()['LastActivityDate'] ?? null;
                    }
                    return null;
                }
            ],
        ];
    }
}
