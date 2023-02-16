<?php

namespace App\Modules\Search\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class ThirdPartiesType extends GraphQLType
{
    protected $attributes = [
        'name' => 'ThirdParties',
        'description' => 'Third Parties',
    ];

    public function fields(): array
    {
        return [
            'ThirdParty' => [
                'type' => Type::listOf(GraphQL::type('ThirdParty')),
                'description' => '',
                'resolve' => function ($value) {
                    return $value->ThirdParty ?? null;
                }
            ],
        ];
    }
}
