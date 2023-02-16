<?php

namespace App\Modules\Search\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class AddressesType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Addresses',
        'description' => 'Addresses',
    ];

    public function fields(): array
    {
        return [
            'Address' => [
                'type' => Type::listOf(GraphQL::type('Address')),
                'description' => '',
                'resolve' => function ($value) {
                    return $value->address ?? null;
                }
            ],
        ];
    }
}
