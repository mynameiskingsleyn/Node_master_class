<?php

namespace App\Modules\Search\Type\Subject;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class SubjectInfoType extends GraphQLType
{
    protected $attributes = [
        'name' => 'SubjectInfo',
        'description' => 'Input needed to enroll a individual'
    ];

    public function fields(): array
    {
        return [
            'SubjectId' => [
                'name' => 'SubjectId',
                'type' => Type::string(),
            ],
            'Lexid' => [
                'name' => 'Lexid',
                'type' => Type::float(),
            ],
            'LastName' => [
                'name' => 'LastName',
                'type' => Type::string(),
            ]
        ];
    }
}
