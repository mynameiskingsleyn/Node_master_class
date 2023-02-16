<?php

namespace App\Modules\Search\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class PhoneRecordsType extends GraphQLType
{
    protected $attributes = [
        'name' => 'PhoneRecords',
        'description' => 'PhoneRecords',
    ];

    public function fields(): array
    {
        return [
            'PhoneRecord' => [
                'type' => Type::listOf(GraphQL::type('PhoneRecord')),
                'description' => '',
            ],
        ];
    }
}
