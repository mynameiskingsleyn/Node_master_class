<?php

namespace App\Modules\PasswordReset\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;

class ResetPasswordInput extends InputType
{
    protected $attributes = [
        'name' => 'ResetPasswordInput',
        'description' => 'Input to reset the user password'
    ];

    public function fields(): array
    {
        return [
            'token' => [
                'name' => 'token',
                'type' => Type::nonNull(Type::string()),
                'rules' => ['required', 'string'],
            ],
            'password' => [
                'name' => 'password',
                'type' => Type::nonNull(Type::string()),
                'rules' => ['required', 'string', 'min:12'],
            ],
            'unlockAccount' => [
                'name' => 'unlockAccount',
                'type' => Type::nonNull(Type::boolean()),
                'rules' => ['required', 'boolean'],
            ],
        ];
    }
}
