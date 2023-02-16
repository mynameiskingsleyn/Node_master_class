<?php

namespace App\Modules\Search\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class EmailsType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Emails',
        'description' => 'Emails',
    ];

    public function fields(): array
    {
        return [
            'Email' => [
                'type' => Type::listOf(Type::string()),
                'description' => '',
            ],
        ];
    }
}
