<?php

namespace App\Modules\PasswordReset\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;

class ValidateTokenInput extends InputType
{
    protected $attributes = [
        'name' => 'ValidateTokenInput',
        'description' => 'Input to validate requested token'
    ];

    public function fields(): array
    {
        return [
            'token' => [
                'name' => 'token',
                'type' => Type::nonNull(Type::string()),
                'rules' => ['required', 'string'],
            ],
        ];
    }
}
