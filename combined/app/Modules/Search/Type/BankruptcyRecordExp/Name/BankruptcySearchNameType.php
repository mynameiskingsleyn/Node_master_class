<?php

namespace App\Modules\Search\Type\BankruptcyRecordExp\Name;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class BankruptcySearchNameType extends GraphQLType
{
    protected $attributes = [
        'name' => 'BankruptcySearchName',
        'description' => 'Bankruptcy Search name',
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
            'Type' => [
                "type" => Type::string(),
                "description" => "",
            ],
            'UniqueId' => [
                "type" => Type::string(),
                "description" => "",
            ],

        ];
    }
}
