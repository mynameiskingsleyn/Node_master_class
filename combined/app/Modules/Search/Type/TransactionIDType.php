<?php

namespace App\Modules\Search\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class TransactionIDType extends GraphQLType
{
    protected $attributes = [
        'name' => 'TransactionID',
        'description' => 'TransactionID',
    ];

    public function fields(): array
    {
        return [
            'TransactionID' => [
                'type' => Type::string(),
                'description' => '',
            ],
        ];
    }
}
