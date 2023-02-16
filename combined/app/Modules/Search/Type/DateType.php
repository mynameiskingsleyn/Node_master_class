<?php

namespace App\Modules\Search\Type;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class DateType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Date',
        'description' => 'Date',
    ];

    public function fields(): array
    {
        return [
            'Year' => [
                'type' => Type::int(),
                'description' => '',
            ],
            'Month' => [
                'type' => Type::int(),
                'description' => '',
            ],
            'Day' => [
                'type' => Type::int(),
                'description' => '',
            ],
        ];
    }
}
