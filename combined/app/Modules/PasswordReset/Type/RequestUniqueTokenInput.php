<?php

namespace App\Modules\PasswordReset\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;
use App\Modules\Shared\ValidationRules;

class RequestUniqueTokenInput extends InputType
{
    protected $attributes = [
        'name' => 'RequestUniqueTokenInput',
        'description' => 'Request unique token verification input'
    ];

    public function fields(): array
    {
        return [
            'userName' => [
                'name' => 'userName',
                'type' => Type::nonNull(Type::string()),
                'rules' => [ValidationRules::userName()],
            ],
        ];
    }
}
