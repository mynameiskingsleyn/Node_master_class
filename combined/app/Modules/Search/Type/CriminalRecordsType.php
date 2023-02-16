<?php

namespace App\Modules\Search\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CriminalRecordsType extends GraphQLType
{
    protected $attributes = [
        'name' => 'CriminalRecords',
        'description' => 'CriminalRecords',
    ];

    public function fields(): array
    {
        return [
            'CriminalRecord' => [
                'type' => Type::listOf(GraphQL::type('CriminalRecord')),
                'description' => '',
            ],
        ];
    }
}
