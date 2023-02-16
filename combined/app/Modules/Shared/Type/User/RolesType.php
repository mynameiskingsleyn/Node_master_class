<?php

namespace App\Modules\Shared\Type\User;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class RolesType extends GraphQLType
{
    protected $attributes = [
        'name' => 'RolesType',
        'description' => 'User roles'
    ];

    public function fields(): array
    {
        return [
            "name" => [
                "type" => Type::string(),
                "description" => "Role name",
            ],
            "code" => [
                "type" => Type::string(),
                "description" => "Role unique identifier",
            ],
            "description" => [
                "type" => Type::string(),
                "description" => "",
            ],
        ];
    }
}
