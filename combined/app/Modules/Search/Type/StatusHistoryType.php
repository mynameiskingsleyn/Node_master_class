<?php

namespace App\Modules\Search\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class StatusHistoryType extends GraphQLType
{
    protected $attributes = [
        'name' => 'StatusHistory',
        'description' => 'Status Histrory',
    ];

    public function fields(): array
    {
        return [
            'Status' => [
                'type' => Type::listOf(GraphQL::type('BankruptcyStatus')),
                'description' => '',
                'resolve' => function ($value) {
                    return $value->Status ?? null;
                }
            ],
        ];
    }
}
