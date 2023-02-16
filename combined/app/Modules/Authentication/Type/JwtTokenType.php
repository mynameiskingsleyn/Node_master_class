<?php

namespace App\Modules\Authentication\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class JwtTokenType extends GraphQLType
{
    protected $attributes = [
        'name' => 'JwtTokenType',
        'description' => 'JWT Authentication Token'
    ];

    public function fields(): array
    {
        return [
            'jwt' => [
                'type' => Type::string(),
                'description' => 'Token',
            ],
            'timestamp' => [
                'type' => Type::string(),
                'description' => 'Timestamp',
            ],
        ];
    }

    public function interfaces(): array
    {
        return [
            GraphQL::type('Tokenable')
        ];
    }
}
