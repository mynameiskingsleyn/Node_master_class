<?php

namespace App\Modules\Search\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class EmailAddressRecordsType extends GraphQLType
{
    protected $attributes = [
        'name' => 'EmailAddressRecords',
        'description' => 'EmailAddressRecords',
    ];

    public function fields(): array
    {
        return [
            'EmailAddressRecord' => [
                'type' => Type::listOf(GraphQL::type('EmailAddressRecord')),
                'description' => '',
            ],
        ];
    }
}
