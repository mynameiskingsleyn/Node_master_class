<?php

namespace App\Modules\Search\Type\Trustee;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class TrusteeType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Trustee',
        'description' => 'Trustee',
    ];

    public function fields(): array
    {
        return [
            'UniqueId' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'TrusteeId' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'AppSSN' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'Title' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'Name' => [
                'type' => GraphQL::type('Name'),
                'description' => '',
            ],
            'OrigAddress' => [
                'type' => GraphQL::Type('OrigAddress'),
                'description' => '',
            ],
            'Address' => [
                'type' => GraphQL::type('Address'),
                'description' => '',
            ],
            'Cart' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'CrSortSz' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'Lot' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'LotOrder' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'DBPC' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'ChkDigit' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'RecType' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'Phone10' => [
                'type' => Type::string(),
                'description' => '',
            ],

        ];
    }
}
