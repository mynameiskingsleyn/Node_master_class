<?php

namespace App\Modules\Shared\Type\User;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class LoginInfoType extends GraphQLType
{
    protected $attributes = [
        'name' => 'LoginInfoType',
        'description' => 'Login information'
    ];

    public function fields(): array
    {
        return [
            "firstLoginDate" => [
                "type" => Type::string(),
                "description" => ""
            ],
            "lastLoginDate" => [
                "type" => Type::string(),
                "description" => ""
            ],
            "loginCount" => [
                "type" => Type::string(),
                "description" => ""
            ],
            "passwordExpireDate" => [
                "type" => Type::string(),
                "description" => ""
            ],
            "wrongPasswordLoginAttempts" => [
                "type" => Type::string(),
                "description" => ""
            ],
            "passwordLockout" => [
                "type" => Type::string(),
                "description" => ""
            ],
            "resetPasswordRequired" => [
                "type" => Type::string(),
                "description" => ""
            ],
            "description" => [
                "type" => Type::string(),
                "description" => ""
            ],
        ];
    }
}
