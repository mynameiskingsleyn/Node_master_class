<?php

namespace App\Modules\Reports\Type;

use App\Modules\Shared\Fields\LexIDField;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use App\Services\Common\DateService;
use Illuminate\Support\Facades\App;

class ReportHistoryType extends GraphQLType
{
    protected $attributes = [
        'name' => 'ReportHistory',
        'description' => 'Represents the historical reports',
    ];

    public function fields(): array
    {
        return [
            'report_id' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'unique_id' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'lexid' => LexIDField::class,
            'output_type' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'status' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'name_last' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'name_first' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pf_status' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'date_added' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    return $value->date_added ? App::make(DateService::class)->getLocalDate($value->date_added)->toDateTimeString() : null;
                }
            ],
            'date_returned' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    return $value->date_returned ? App::make(DateService::class)->getLocalDate($value->date_returned)->toDateTimeString() : null;
                }
            ],
        ];
    }
}
