<?php

namespace App\Modules\Search\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class NeighborRecordsType extends GraphQLType
{
    protected $attributes = [
        'name' => 'NeighborRecords',
        'description' => 'NeighborRecords',
    ];

    public function fields(): array
    {
        return [
            'NeighborRecord' => [
                'type' => Type::listOf(GraphQL::type('NeighborRecord')),
                'description' => '',
            ],
        ];
    }
}
