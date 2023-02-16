<?php

namespace App\Modules\Search\Type\InputRecord\Fields;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Field;

class SocialSecurityNumberField extends Field
{
    protected $attributes = [
        'name' => 'SSN',
        'description'   => 'Consumer SSN ',
    ];

    public function type(): Type
    {
        return Type::string();
    }

    public function args(): array
    {
        return [
        ];
    }
}
