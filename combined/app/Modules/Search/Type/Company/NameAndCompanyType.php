<?php

namespace App\Modules\Search\Type\Company;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class NameAndCompanyType extends GraphQLType
{
    protected $attributes = [
        'name' => 'NameAndCompany',
        'description' => 'Name and Company',
    ];

    public function fields(): array
    {
        return [
            'Full' => [
                "type" => Type::string(),
                "description" => "",
            ],
            'First' => [
                "type" => Type::string(),
                "description" => "",
            ],
            'Middle' => [
                "type" => Type::string(),
                "description" => "",
            ],
            'Last' => [
                "type" => Type::string(),
                "description" => "",
            ],
            'Suffix' => [
                "type" => Type::string(),
                "description" => "",
            ],
            'Prefix' => [
                "type" => Type::string(),
                "description" => "",
            ],
            'CompanyName' => [
                "type" => Type::string(),
                "description" => "",
            ],
        ];
    }
}
