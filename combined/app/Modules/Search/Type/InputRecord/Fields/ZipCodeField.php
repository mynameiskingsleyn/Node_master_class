<?php

namespace App\Modules\Search\Type\InputRecord\Fields;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Field;

class ZipCodeField extends Field
{
    protected $attributes = [
        'name' => 'Zip',
        'description'   => 'Consumer zip (can be zip or zip+4)',
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
