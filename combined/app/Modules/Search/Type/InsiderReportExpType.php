<?php

namespace App\Modules\Search\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Services\Report\ReportsService;
use App\Services\Report\ReportTypesConstant;
use Illuminate\Support\Facades\App;
use App\Services\Common\DateService;

class InsiderReportExpType extends GraphQLType
{
    private $reportsService;

    public function __construct(ReportsService $reportsService)
    {
        $this->reportsService = $reportsService;
    }

    protected $attributes = [
        'name' => 'InsiderReportExp',
        'description' => 'Insider Report',
    ];

    public function fields(): array
    {
        return [
            'SubjectEcho' => [
                'type' => GraphQL::type('SubjectInfo'),
                'description' => ''
            ],
            'SubjectInformation' => [
                'type' => GraphQL::type('Subject'),
                'description' => ''
            ],
            'PublicRecordReportStatus' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    if (is_object($value)) {
                        return $value->PublicRecordReportStatus ?? null;
                    }
                }
            ],
            'PublicRecordReportFormat' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    if (is_object($value)) {
                        return $value->PublicRecordReportFormat ?? null;
                    }
                }
            ],

            'PublicRecordReport' => [
                'type' => GraphQL::type('PublicRecordReportExp'),
                'description' => '',
                'resolve' => function ($value) {
                    if (is_object($value)) {
                        $publicReport = empty($value->PublicRecordReport) === false
                                        ? $this->decodeXml($value->PublicRecordReport)
                                        : null;
                        if ($publicReport && is_object($publicReport)) {
                            if (empty($value->ReportRef) === false) {
                                foreach ($value->ReportRef as $key => $val) {
                                    if ($publicReport instanceof \SimpleXMLElement) {
                                          $publicReport->addChild($key, $val);
                                    } else {
                                          $publicReport->$key = $val;
                                    }
                                }
                            }
                            if (empty($value->Notes) === false) {
                                $notes = $value->Notes->firstWhere('output_type', ReportTypesConstant::PUBLIC_RECORD);
                                if ($publicReport instanceof \SimpleXMLElement) {
                                    $publicReport->addChild('Notes', $notes->notes ?? null);
                                } else {
                                    $publicReport->Notes = $notes->notes ?? null;
                                }
                            }
                        }

                        return $publicReport;
                    }
                    return null;
                }
            ],
            'PublicRecordReportDate' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    if (is_object($value)) {
                        return $value->PublicRecordReportDate ?? null;
                    }
                }
            ],
            'PublicRecordNonFCRAReportStatus' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    if (is_object($value)) {
                        return $value->PublicRecordEXReportStatus ?? null;
                    }
                }
            ],
            'PublicRecordNonFCRAReport' => [
                'type' => GraphQL::type('PublicRecordNonFCRAReport'),
                'description' => '',
                'resolve' => function ($value) {
                    if (is_object($value)) {
                        $nonFcraPublicReport = empty($value->PublicRecordExReport) === false
                                        ? $this->decodeXml($value->PublicRecordExReport)
                                        : null;
                        if (
                            $nonFcraPublicReport && is_object($nonFcraPublicReport)
                            && $nonFcraPublicReport instanceof \SimpleXMLElement
                        ) {
                            if (empty($value->ReportRef) === false) {
                                foreach ($value->ReportRef as $key => $val) {
                                    $nonFcraPublicReport->addChild($key, $val);
                                }
                            }
                            if (empty($value->Notes) === false) {
                                $notes = $value->Notes
                                        ->firstWhere('output_type', ReportTypesConstant::NONFCRA_PUBLIC_RECORD);
                                $nonFcraPublicReport->addChild('Notes', $notes->notes ?? null);
                            }
                        }

                        return $nonFcraPublicReport;
                    }
                    return null;
                }
            ],
            'CreditReportData' => [
                'type' => GraphQL::type('CreditReportData'),
                'description' => '',
                'resolve' => function ($value, $args) {
                    if (isset($value->CreditReportData) && is_object($value->CreditReportData)) {
                        if (empty($value->ReportRef) === false) {
                            $value->CreditReportData->ReportRef = $value->ReportRef;
                        }

                        // Add notes
                        if (empty($value->Notes) === false) {
                            $notes = $value->Notes->firstWhere('output_type', ReportTypesConstant::CREDIT_REPORT);
                            $value->CreditReportData->Notes = $notes->notes ?? null;
                        }
                    }

                    return $value->CreditReportData ?? null;
                }
            ],
            'ReportDate' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value, $args) {
                    if (isset($value->ReportRef)) {
                        return $this->reportsService
                        ->getReportDate($value->ReportRef, ReportTypesConstant::COMPLETE_REPORT);
                    }
                    return null;
                }
            ],
        ];
    }

    public function decodeXml($xmlString)
    {
        $doc = null;
        if (empty($xmlString) === false) {
            if (is_string($xmlString)) {
                if (strpos($xmlString, config('search.Suppressed_phrase')) === false) {
                    $doc = simplexml_load_string($xmlString, 'SimpleXMLElement', LIBXML_COMPACT | LIBXML_NOENT);
                }
            } else {
                $doc = $xmlString;
            }
        }
        return $doc;
    }
}
