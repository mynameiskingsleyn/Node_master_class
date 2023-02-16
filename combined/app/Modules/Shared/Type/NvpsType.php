<?php

namespace App\Modules\Shared\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class NvpsType extends GraphQLType
{
    protected $attributes = [
        'name' => 'NvpsType',
        'description' => 'Nvps'
    ];

    public function fields(): array
    {
        return [
            "id" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "name" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "value" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "code" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "type" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "description" => [
                "type" => Type::string(),
                "description" => "",
            ],
        ];
    }
}
