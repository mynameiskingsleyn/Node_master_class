<?php

namespace App\Modules\Reports\Type;

use App\Modules\Shared\Fields\LexIDField;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;

class ReportFiltersType extends InputType
{
    protected $attributes = [
        'name' => 'ReportFilters',
        'description' => 'List of filters to apply when fetching the reports',
    ];

    public function fields(): array
    {
        return [
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
            'cr_id' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'cr_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'cr_status' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pr_id' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pr_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pr_status' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'date_added' => [
                'type' => Type::string(),
                'description' => '',
            ]
        ];
    }
}
