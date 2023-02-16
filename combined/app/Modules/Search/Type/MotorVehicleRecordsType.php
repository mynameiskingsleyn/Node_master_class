<?php

namespace App\Modules\Search\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class MotorVehicleRecordsType extends GraphQLType
{
    protected $attributes = [
        'name' => 'MotorVehicleRecords',
        'description' => 'MotorVehicleRecords',
    ];

    public function fields(): array
    {
        return [
            'MotorVehicleRecord' => [
                'type' => Type::listOf(GraphQL::type('MotorVehicleRecord')),
                'description' => '',
            ],
        ];
    }
}
