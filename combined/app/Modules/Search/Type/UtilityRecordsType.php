<?php

namespace App\Modules\Search\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class UtilityRecordsType extends GraphQLType
{
    protected $attributes = [
        'name' => 'UtilityRecords',
        'description' => 'UtilityRecords',
    ];

    public function fields(): array
    {
        return [
            'UtilityRecord' => [
                'type' => Type::listOf(GraphQL::type('UtilityRecord')),
                'description' => '',
            ],
        ];
    }
}
