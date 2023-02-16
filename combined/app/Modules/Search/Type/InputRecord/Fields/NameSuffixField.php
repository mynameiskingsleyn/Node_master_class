<?php

namespace App\Modules\Search\Type\InputRecord\Fields;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Field;

class NameSuffixField extends Field
{
    protected $attributes = [
        'name' => 'SuffixName',
        'description'   => 'Suffix Name, if any',
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
