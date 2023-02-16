<?php

namespace App\Modules\Search\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class DocketsType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Dockets',
        'description' => 'Dockets',
    ];

    public function fields(): array
    {
        return [
            'Docket' => [
                'type' => Type::listOf(GraphQL::type('Docket')),
                'description' => '',
                'resolve' => function ($value) {
                    return $value->Docket ?? null;
                }
            ],
        ];
    }
}
