<?php

namespace App\Modules\Search\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class ForeclosureRecordsType extends GraphQLType
{
    protected $attributes = [
        'name' => 'ForeclosureRecords',
        'description' => 'ForeclosureRecords',
    ];

    public function fields(): array
    {
        return [
            'ForeclosureRecord' => [
                'type' => Type::listOf(GraphQL::type('ForeclosureRecord')),
                'description' => '',
            ],
        ];
    }
}
