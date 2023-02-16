<?php

namespace App\Modules\Search\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class AssociateRecordsType extends GraphQLType
{
    protected $attributes = [
        'name' => 'AssociateRecords',
        'description' => 'AssociateRecords',
    ];

    public function fields(): array
    {
        return [
            'AssociateRecord' => [
                'type' => Type::listOf(GraphQL::type('AssociateRecord')),
                'description' => '',
            ],
        ];
    }
}
