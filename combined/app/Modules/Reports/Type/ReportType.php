<?php

namespace App\Modules\Reports\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use App\Services\Report\ReportsService;
use App\Modules\Shared\Fields\LexIDField;
use App\Services\Common\DateService;
use Illuminate\Support\Facades\App;
use DB;

class ReportType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Report',
        'description' => 'Represents an insider report',
    ];

    /**
     * @var ReportsService
     */
    private $reportService;

    public function __construct(ReportsService $reportService)
    {
        $this->reportService = $reportService;
    }

    public function fields(): array
    {
        return [
            'record_id' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'unique_id' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'name_first' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'name_last' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'lexid' => LexIDField::class,
            'watcher' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'max_pr_date' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    return isset($value->max_pr_date) ? App::make(DateService::class)->getLocalDate($value->max_pr_date)->toDateTimeString() : null;
                }
            ],
            'max_cr_date' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    return isset($value->max_cr_date) ? App::make(DateService::class)->getLocalDate($value->max_cr_date)->toDateTimeString() : null;
                }
            ],
            'max_nr_date' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    return isset($value->max_nr_date) ? App::make(DateService::class)->getLocalDate($value->max_nr_date)->toDateTimeString() : null;
                }
            ],
            'report_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'report_type' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    if (empty($value->max_pr_date) === false && empty($value->max_cr_date) === false) {
                        return 'Complete';
                    } elseif (empty($value->max_pr_date) === false && empty($value->max_cr_date) === true) {
                        return 'Public Records';
                    } elseif (empty($value->max_pr_date) === true && empty($value->max_cr_date) === false) {
                        return 'Credit';
                    } else {
                        return '';
                    }
                }
            ],
            'pr_id' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'cr_id' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'nr_id' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pf_status' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pr_status' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'cr_status' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pr_alert' => [
                'type' => Type::boolean(),
                'description' => '',
            ],
            'cr_alert' => [
                'type' => Type::boolean(),
                'description' => '',
            ],
            'nr_status' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'status' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'triggered' => [
                'type' => Type::boolean(),
                'description' => '',
                'resolve' => function ($value) {
                    return empty($value->max_nr_date) ? false : true;
                }
            ]
        ];
    }
}
