<?php

namespace App\Modules\Search\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class WatercraftRecordsType extends GraphQLType
{
    protected $attributes = [
        'name' => 'WatercraftRecords',
        'description' => 'WatercraftRecords',
    ];

    public function fields(): array
    {
        return [
            'WatercraftRecord' => [
                'type' => Type::listOf(GraphQL::type('WatercraftRecord')),
                'description' => '',
            ],
        ];
    }
}
