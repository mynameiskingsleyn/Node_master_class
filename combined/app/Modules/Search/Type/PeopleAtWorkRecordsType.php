<?php

namespace App\Modules\Search\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class PeopleAtWorkRecordsType extends GraphQLType
{
    protected $attributes = [
        'name' => 'PeopleAtWorkRecords',
        'description' => 'PeopleAtWorkRecords',
    ];

    public function fields(): array
    {
        return [
            'PeopleAtWorkRecord' => [
                'type' => Type::listOf(GraphQL::type('PeopleAtWorkRecord')),
                'description' => '',
            ],
        ];
    }
}
