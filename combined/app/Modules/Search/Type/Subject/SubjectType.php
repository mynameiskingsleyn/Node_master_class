<?php

namespace App\Modules\Search\Type\Subject;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class SubjectType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Subject',
        'description' => 'Individual information'
    ];

    public function fields(): array
    {
        return [
            'Name' => [
                'name' => 'Name',
                'type' => GraphQL::type('Name'),
            ],
            'Address' => [
                'name' => 'Address',
                'type' => GraphQL::type('Address'),
            ],
            'DOB' => [
                'name' => 'DOB',
                'type' => GraphQL::type('DOB'),
            ],
            'SSN' => [
                'name' => 'SSN',
                'type' => Type::string()
            ]
        ];
    }
}
