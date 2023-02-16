<?php

namespace App\Modules\Shared\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;

class FilterType extends InputType
{
    protected $attributes = [
        'name' => 'FilterType',
        'description' => 'Filter',
    ];

    public function fields(): array
    {
        return [
            'attribute' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'value' => [
                'type' => Type::string(),
                'description' => '',
            ],
        ];
    }
}
