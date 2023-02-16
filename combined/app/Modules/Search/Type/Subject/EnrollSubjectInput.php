<?php

namespace App\Modules\Search\Type\Subject;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class EnrollSubjectInput extends InputType
{
    protected $attributes = [
        'name' => 'EnrollSubjectInput',
        'description' => 'Input needed to enroll a subject'
    ];

    public function fields(): array
    {
        return [
            'Name' => [
                'name' => 'Name',
                'type' => GraphQL::type('NameInput'),
            ],
            'Address' => [
                'name' => 'Address',
                'type' => GraphQL::type('AddressInput'),
            ],
            'DOB' => [
                'name' => 'DOB',
                'type' => GraphQL::type('DOBInput'),
            ],
            'SSN' => [
                'name' => 'SSN',
                'type' => Type::string()
            ]
        ];
    }
}
