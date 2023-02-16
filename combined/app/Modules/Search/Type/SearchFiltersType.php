<?php

namespace App\Modules\Search\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;
use App\Modules\Shared\ValidationRules;

class SearchFiltersType extends InputType
{
    protected $attributes = [
        'name' => 'SearchFilters',
        'description' => 'List of filters to apply when searching individuals.',
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::string(),
                'description' => '',
                'rules' => ['nullable', 'alpha_num'],
            ],
            'unique_id' => [
                'type' => Type::string(),
                'description' => '',
                'rules' => ['nullable', 'alpha_num'],
            ],
            'first_name' => [
                'type' => Type::string(),
                'description' => '',
                'rules' => ['nullable', ValidationRules::alphaWithSpaces()],
            ],
            'last_name' => [
                'type' => Type::string(),
                'description' => '',
                'rules' => ['nullable', ValidationRules::alphaWithSpaces()],
            ],
            'middle_name' => [
                'type' => Type::string(),
                'description' => '',
                'rules' => ['nullable', ValidationRules::alphaWithSpaces()],
            ],
            'street_address' => [
                'type' => Type::string(),
                'description' => '',
                'rules' => ['nullable', ValidationRules::address()],
            ],
            'city' => [
                'type' => Type::string(),
                'description' => '',
                'rules' => ['nullable', ValidationRules::city()],
            ],
            'state' => [
                'type' => Type::string(),
                'description' => '',
                'rules' => ['nullable', ValidationRules::state()],
            ],
            'zipcode' => [
                'type' => Type::string(),
                'description' => '',
                'rules' => ['nullable', 'digits:5'],
            ],
            'ssn' => [
                'type' => Type::string(),
                'description' => '',
                'rules' => ['nullable', 'digits:9'],
            ],
            'dob' => [
                'type' => Type::string(),
                'description' => '',
                'rules' => ['nullable', 'date']
            ],
            'lexid' => [
                'type' => Type::string(),
                'description' => '',
                'rules' => ['nullable', 'numeric']
            ],
            'date_added' => [
                'type' => Type::string(),
                'description' => '',
                'rules' => ['date'],
            ],
            'date_range' => [
                'type' => Type::string(),
                'description' => '',
                'rules' => [ValidationRules::dateRangeName()],
            ],
            'start_date' => [
                'type' => Type::string(),
                'description' => '',
                'rules' => ['date'],
            ],
            'end_date' => [
                'type' => Type::string(),
                'description' => '',
                'rules' => ['date'],
            ],
        ];
    }
}
