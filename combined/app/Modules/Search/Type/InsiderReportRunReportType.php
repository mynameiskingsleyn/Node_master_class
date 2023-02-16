<?php

namespace App\Modules\Search\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Services\Report\ReportsService;
use App\Services\Report\ReportTypesConstant;
use Illuminate\Support\Facades\App;
use App\Services\Common\DateService;

class InsiderReportRunReportType extends GraphQLType
{
    private $reportsService;

    public function __construct(ReportsService $reportsService)
    {
        $this->reportsService = $reportsService;
    }

    protected $attributes = [
        'name' => 'InsiderReportRunReport',
        'description' => 'Insider Report for Run Report',
    ];

    public function fields(): array
    {
        return [
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

            'PublicRecordReportMessage' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    if (is_object($value)) {
                        return $value->PublicRecordReportMessage ?? null;
                    }
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

            'CreditReportData' => [
                'type' => GraphQL::type('RunReportCreditReportData'),
                'description' => '',
                'resolve' => function ($value, $args) {
                    if (isset($value->CreditReportData) && is_object($value->CreditReportData)) {
                        if (empty($value->ReportRef) === false) {
                            $value->CreditReportData->ReportRef = $value->ReportRef;
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

}
