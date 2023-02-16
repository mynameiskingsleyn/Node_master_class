<?php

namespace App\Modules\Reports\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use App\Services\Report\ReportsService;
use DB;

class AgencyNotesType extends GraphQLType
{
    protected $attributes = [
        'name' => 'AgencyNotes',
        'description' => 'Represents notes added by the agency',
    ];

    public function __construct()
    {
    }

    public function fields(): array
    {
        return [
            'type' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    return $value->output_type;
                }
            ],
            'reportId' => [
                'type' => Type::int(),
                'description' => '',
                'resolve' => function ($value) {
                    return $value->report_id;
                }
            ],
            'notes' => [
                'type' => Type::string(),
                'description' => '',
            ],
        ];
    }
}
