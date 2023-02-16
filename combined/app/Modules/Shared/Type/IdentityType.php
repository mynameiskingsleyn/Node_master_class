<?php

namespace App\Modules\Shared\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class IdentityType extends GraphQLType
{
    protected $attributes = [
        'name' => 'IdentityType',
        'description' => 'Identity type'
    ];

    public function fields(): array
    {
        return [
            "sessionId" => [
                "type" => Type::string(),
                "description" => "Unique identifier of the session"
            ],
            "user" => [
                "type" => GraphQL::type('UserType'),
                "description" => "User information"
            ],
        ];
    }
}
