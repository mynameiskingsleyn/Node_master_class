<?php

namespace App\Modules\Search\Type\InputRecord\Fields;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Field;

class MiddleNameField extends Field
{
    protected $attributes = [
        'name' => 'MiddleName',
        'description'   => 'Middle Name of Consumer',
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
