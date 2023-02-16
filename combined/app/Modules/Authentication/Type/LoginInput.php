<?php

namespace App\Modules\Authentication\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;
use App\Modules\Shared\ValidationRules;

class LoginInput extends InputType
{
    protected $attributes = [
        'name' => 'LoginInput',
        'description' => 'User credentials'
    ];

    public function fields(): array
    {
        return [
            'userName' => [
                'name' => 'userName',
                'type' => Type::nonNull(Type::string()),
                'rules' => [ValidationRules::username()],
            ],
            'password' => [
                'name' => 'password',
                'type' => Type::nonNull(Type::string()),
            ]
        ];
    }
}
