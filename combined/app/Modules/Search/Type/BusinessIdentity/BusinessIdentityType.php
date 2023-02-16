<?php

namespace App\Modules\Search\Type\BusinessIdentity;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class BusinessIdentityType extends GraphQLType
{
    protected $attributes = [
        'name' => 'BusinessIdentity',
        'description' => 'Business Identity',
    ];

    public function fields(): array
    {
        return [
            'DotID' => [
                'type' => Type::int(),
                'description' => '',
            ],
            'EmpID' => [
                'type' => Type::int(),
                'description' => '',
            ],
            'POWID' => [
                'type' => Type::int(),
                'description' => '',
            ],
            'ProxID' => [
                'type' => Type::int(),
                'description' => '',
            ],
            'SeleID' => [
                'type' => Type::int(),
                'description' => '',
            ],
            'OrgID' => [
                'type' => Type::int(),
                'description' => '',
            ],
            'UltID' => [
                'type' => Type::int(),
                'description' => '',
            ],
        ];
    }
}
