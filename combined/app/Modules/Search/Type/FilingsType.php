<?php

namespace App\Modules\Search\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class FilingsType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Filings',
        'description' => 'Filings',
    ];

    public function fields(): array
    {
        return [
            'Filing' => [
                'type' => Type::listOf(GraphQL::type('Filing')),
                'description' => '',
                'resolve' => function ($value) {
                    return $value->Filing ?? null;
                }
            ],
        ];
    }
}
