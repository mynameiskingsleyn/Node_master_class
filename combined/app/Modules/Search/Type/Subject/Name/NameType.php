<?php

namespace App\Modules\Search\Type\Subject\Name;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class NameType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Name',
        'description' => 'Name of the individual',
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
        ];
    }
}
