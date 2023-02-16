<?php

namespace App\Modules\Search\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class SexOffenderRecordsType extends GraphQLType
{
    protected $attributes = [
        'name' => 'SexOffenderRecords',
        'description' => 'SexOffenderRecords',
    ];

    public function fields(): array
    {
        return [
            'SexOffenderRecord' => [
                'type' => Type::listOf(GraphQL::type('SexOffenderRecord')),
                'description' => 'Represents a Sex Offender record',
            ],
        ];
    }
}
