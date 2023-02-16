<?php

namespace App\Modules\Search\Type\Subject;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class InputEchoType extends GraphQLType
{
    protected $attributes = [
        'name' => 'InputEcho',
        'description' => 'Input needed to enroll a subject'
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
