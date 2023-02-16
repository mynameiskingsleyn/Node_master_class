<?php

namespace App\Modules\Shared\Type\User;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class PermissionsType extends GraphQLType
{
    protected $attributes = [
        'name' => 'PermissionsType',
        'description' => 'Collection of permissions for the authenticated session'
    ];

    public function fields(): array
    {
        return [
            "name" => [
                "type" => Type::string(),
                "description" => "Permission name"
            ],
            "code" => [
                "type" => Type::string(),
                "description" => "Permission unique identifier"
            ],
            "description" => [
                "type" => Type::string(),
                "description" => "Permission description"
            ],
        ];
    }
}
