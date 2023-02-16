<?php

namespace App\Modules\Search\Type\Subject;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;
use App\Modules\Shared\ValidationRules;

class SubjectInfoInput extends InputType
{
    protected $attributes = [
        'name' => 'SubjectInfoInput',
        'description' => 'Individual input'
    ];

    public function fields(): array
    {
        return [
            'SubjectId' => [
                'name' => 'SubjectId',
                'type' => Type::string(),
                'rules' => ['required', 'alpha_num'],
            ],
            'Lexid' => [
                'name' => 'Lexid',
                'type' => Type::float(),
                'rules' => ['required', 'numeric']
            ],
            'LastName' => [
                'name' => 'LastName',
                'type' => Type::string(),
                'rules' => ['required', ValidationRules::alphaWithSpaces()],
            ]
        ];
    }
}
