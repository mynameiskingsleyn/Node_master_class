<?php

namespace App\Modules\Search\Type\InputRecord\Fields;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Field;

class LastNameField extends Field
{
    protected $attributes = [
        'name' => 'LastName',
        'description'   => 'Last Name of Consumer',
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
