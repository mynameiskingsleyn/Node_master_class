<?php

namespace App\Modules\Search\Type\Subject;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Modules\Shared\ValidationRules;

class RemoveSubjectInput extends InputType
{
    protected $attributes = [
        'name' => 'RemoveSubjectInput',
        'description' => 'Input needed to remove a subject'
    ];

    public function fields(): array
    {
        return [
            'SubjectId' => [
              "type" => Type::string(),
              "description" => "",
              "rules" => ['required', 'alpha_num']
            ],
            'Lexid' => [
              'type' => Type::string(),
              'rules' => ['required', 'numeric'],
              "description" => "",
            ],
            'LastName' => [
              "type" => Type::string(),
              "description" => "",
              'rules' => ['required', ValidationRules::alphaWithSpaces()]
            ]
        ];
    }
}
