<?php

namespace App\Modules\Search\Type\Subject;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class StatusType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Status',
        'description' => 'Status response'
    ];

    public function fields(): array
    {
        return [
            'Success' => [
                'name' => 'Success',
                'type' => Type::string(),
            ],
            'Description' => [
                'name' => 'Description',
                'type' => Type::string(),
            ],
        ];
    }
}
