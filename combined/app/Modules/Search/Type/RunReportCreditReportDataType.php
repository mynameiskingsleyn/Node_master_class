<?php

namespace App\Modules\Search\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Modules\Search\Services\CreditReportResolver;
use App\Services\Report\ReportsService;
use App\Services\Report\ReportTypesConstant;
use DOMDocument;

class RunReportCreditReportDataType extends GraphQLType
{
    private $reportsService;

    public function __construct(ReportsService $reportsService)
    {
        $this->reportsService = $reportsService;
    }

    protected $attributes = [
        'name' => 'RunReportCreditReportData',
        'description' => 'Run report Credit Record',
    ];

    public function fields(): array
    {
        return [
            'ReportDate' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value, $args) {
                    return $this->reportsService->getDate($value->CreditReportDate);
                }
            ],
            'ReportStatus' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value, $args) {
                    return $value->CreditReportStatus ?? null;
                }
            ],
            'ReportFormat' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value, $args) {
                    return $value->CreditReportFormat ?? null;
                }
            ],
            'Disclaimer' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'CreditReport' => [
                'type' => GraphQL::type('CreditRecordReport'),
                'description' => '',
                'resolve' => function ($value) {
                    if (is_object($value) && empty($value->CreditReport) === false) {
                        $doc = new DOMDocument();
                        $doc->encoding = 'UTF-8';
                        $doc->loadXML($value->CreditReport);

                        $creditReportResolver = new CreditReportResolver();

                        $report = $creditReportResolver->getReport($doc->saveXML());

                        // Add notes
                        if (empty($value->Notes) === false) {
                            $report['Notes'] = $value->Notes;
                        }

                        $report['ReportRef'] = $value->ReportRef;

                        return $report;
                    }
                    return null;
                }
            ],
        ];
    }
}
