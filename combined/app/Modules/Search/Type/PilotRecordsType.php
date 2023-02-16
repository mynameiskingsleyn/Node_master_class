<?php

namespace App\Modules\Search\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class PilotRecordsType extends GraphQLType
{
    protected $attributes = [
        'name' => 'PilotRecords',
        'description' => 'PilotRecords',
    ];

    public function fields(): array
    {
        return [
            'PilotRecord' => [
                'type' => Type::listOf(GraphQL::type('PilotRecord')),
                'description' => '',
            ],
        ];
    }
}
