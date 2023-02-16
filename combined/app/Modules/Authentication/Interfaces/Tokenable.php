<?php

namespace App\Modules\Authentication\Interfaces;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InterfaceType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class Tokenable extends InterfaceType
{
    protected $attributes = [
        'name' => 'Tokenable',
        'description' => 'Tokenable interface',
    ];

    public function fields(): array
    {
        return [
            'jwt' => [
                'type' => Type::string(),
                'description' => 'JWT Token',
            ],
            'timestamp' => [
                'type' => Type::string(),
                'description' => 'Timestamp',
            ],
        ];
    }

    public function resolveType($root)
    {
        return GraphQL::type('JwtTokenType');
    }
}
