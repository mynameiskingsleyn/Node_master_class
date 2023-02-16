<?php

namespace App\Modules\Search\Type\InputRecord\Fields;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Field;

class StateField extends Field
{
    protected $attributes = [
        'name' => 'State',
        'description'   => 'Consumer 2 digit state',
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
