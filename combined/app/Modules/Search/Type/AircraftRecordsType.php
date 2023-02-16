<?php

namespace App\Modules\Search\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class AircraftRecordsType extends GraphQLType
{
    protected $attributes = [
        'name' => 'AircraftRecords',
        'description' => 'AircraftRecords',
    ];

    public function fields(): array
    {
        return [
            'AircraftRecord' => [
                'type' => Type::listOf(GraphQL::type('AircraftRecord')),
                'description' => '',
            ],
        ];
    }
}
