<?php

namespace App\Modules\Search\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class PropertyRecordsType extends GraphQLType
{
    protected $attributes = [
        'name' => 'PropertyRecords',
        'description' => 'PropertyRecords',
    ];

    public function fields(): array
    {
        return [
            'PropertyRecord' => [
                'type' => Type::listOf(GraphQL::type('PropertyRecord')),
                'description' => '',
            ],
        ];
    }
}
