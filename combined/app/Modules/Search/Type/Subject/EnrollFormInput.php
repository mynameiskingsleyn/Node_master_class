<?php

namespace App\Modules\Search\Type\Subject;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Modules\Shared\Rules\AllowAgencyID;
use App\Modules\Shared\ValidationRules;

class EnrollFormInput extends InputType
{
    protected $attributes = [
        'name' => 'EnrollFormInput',
        'description' => 'Input needed to enroll a subject'
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::string(),
                'rules' => ['nullable', 'alpha_num'],
            ],
            'lexid' => [
                'name' => 'lexid',
                'type' => Type::string(),
                'rules' => ['nullable', 'numeric']
            ],
            'last_name' => [
                'name' => 'last_name',
                'type' => Type::nonNull(Type::string()),
                'rules' => ['required', ValidationRules::alphaWithSpaces()],
            ],
            'first_name' => [
                'name' => 'first_name',
                'type' => Type::nonNull(Type::string()),
                'rules' => ['required', ValidationRules::alphaWithSpaces()],
            ],
            'middle_name' => [
                'name' => 'middle_name',
                'type' => Type::string(),
                'rules' => ['nullable', ValidationRules::alphaWithSpaces()],
            ],
            'street_address' => [
                'name' => 'street_address',
                'type' => Type::nonNull(Type::string()),
                'rules' => ['required', ValidationRules::address()],
            ],
            'city' => [
                'name' => 'city',
                'type' => Type::nonNull(Type::string()),
                'rules' => ['required', ValidationRules::city()],
            ],
            'state' => [
                'name' => 'state',
                'type' => Type::nonNull(Type::string()),
                'rules' => ['required', ValidationRules::state()],
            ],
            'zipcode' => [
                'name' => 'zipcode',
                'type' => Type::nonNull(Type::string()),
                'rules' => ['required', 'numeric'],
            ],
            'ssn' => [
                'name' => 'ssn',
                'type' => Type::nonNull(Type::string()),
                'rules' => ['required', 'numeric'],
            ],
            'dob' => [
                'name' => 'dob',
                'type' => Type::nonNull(GraphQL::type('DOBInput')),
                'rules' => ['required'],
            ],
            'register' => [
                'name' => 'register',
                'type' => Type::boolean()
            ],
            'agency_subject_id' => [
                'name' => 'agency_subject_id',
                'type' => Type::string(),
                'description' => '',
                'rules' => ['nullable', 'alpha_num', new AllowAgencyID()],
            ],
        ];
    }
}
