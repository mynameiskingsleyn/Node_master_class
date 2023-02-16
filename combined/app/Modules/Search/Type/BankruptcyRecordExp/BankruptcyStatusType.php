<?php

namespace App\Modules\Search\Type\BankruptcyRecordExp;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class BankruptcyStatusType extends GraphQLType
{
    protected $attributes = [
        'name' => 'BankruptcyStatus',
        'description' => 'Bankruptcy status',
    ];

    public function fields(): array
    {
        return [
            'Type' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'Date' => [
                'type' => GraphQL::type('Date'),
                'description' => '',
            ],

        ];
    }
}
