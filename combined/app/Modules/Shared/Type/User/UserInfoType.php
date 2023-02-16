<?php

namespace App\Modules\Shared\Type\User;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserInfoType extends GraphQLType
{
    protected $attributes = [
        'name' => 'UserInfoType',
        'description' => 'User information'
    ];

    public function fields(): array
    {
        return [
            "userName" => [
                'type' => Type::string(),
                'description' => 'User name',
            ],
            "fullUserName" => [
                'type' => Type::string(),
                'description' => 'Full name',
            ],
            "status" => [
                'type' => Type::string(),
                'description' => 'Status',
            ],
            "type" => [
                'type' => Type::string(),
                'description' => 'Type',
            ],
            "dateAdded" => [
                'type' => Type::string(),
                'description' => 'Date user was added',
            ],
            "userAdded" => [
                'type' => Type::string(),
                'description' => 'User added by',
            ],
            "employeeId" => [
                'type' => Type::string(),
                'description' => 'Employee identifier',
            ],
            "firstName" => [
                'type' => Type::string(),
                'description' => 'First name',
            ],
            "lastName" => [
                'type' => Type::string(),
                'description' => 'Last name',
            ],
            "middleName" => [
                'type' => Type::string(),
                'description' => 'Middle name',
            ],
            "suffixName" => [
                'type' => Type::string(),
                'description' => 'Suffix name',
            ],
            "email" => [
                'type' => Type::string(),
                'description' => 'E-mail',
            ],
            "phone" => [
                'type' => Type::string(),
                'description' => 'Phone number',
            ],
            "phone_ext" => [
                'type' => Type::string(),
                'description' => 'Phone extension',
            ],
            "phone2" => [
                'type' => Type::string(),
                'description' => 'Secondary phone',
            ],
            "phone2_ext" => [
                'type' => Type::string(),
                'description' => 'Secondary phone extension',
            ],
            "description" => [
                'type' => Type::string(),
                'description' => '',
            ],
        ];
    }
}
