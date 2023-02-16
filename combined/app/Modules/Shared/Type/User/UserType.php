<?php

namespace App\Modules\Shared\Type\User;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'UserType',
        'description' => 'User information and privileges'
    ];

    public function fields(): array
    {
        return [
            'userInfo' => [
                'type' => GraphQL::type('UserInfoType'),
                'description' => 'User account information',
            ],
            'loginInfo' => [
                'type' => GraphQL::type('LoginInfoType'),
                'description' => 'Login details',
            ],
            'nvps' => [
                'type' => Type::listOf(GraphQL::type('NvpsType')),
                'description' => 'Set of Nvps',
            ],
            'roles' => [
                'type' => Type::listOf(GraphQL::type('RolesType')),
                'description' => 'Roles for the user',
            ],
            'permissions' => [
                'type' => Type::listOf(GraphQL::type('PermissionsType')),
                'description' => 'Permissions for the user',
            ],
        ];
    }
}
