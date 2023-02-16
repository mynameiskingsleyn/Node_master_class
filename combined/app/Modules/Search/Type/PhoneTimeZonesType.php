<?php

namespace App\Modules\Search\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class PhoneTimeZonesType extends GraphQLType
{
    protected $attributes = [
        'name' => 'PhoneTimeZones',
        'description' => 'Phone Time zones',
    ];

    public function fields(): array
    {
        return [
            'Phone' => [
                'type' => Type::listOf(GraphQL::type('PhoneTimeZone')),
                'description' => '',
            ],
        ];
    }
}
