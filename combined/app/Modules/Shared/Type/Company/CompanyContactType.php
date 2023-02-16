<?php

namespace App\Modules\Shared\Type\Company;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CompanyContactType extends GraphQLType
{
    protected $attributes = [
        'name' => 'CompanyContactType',
        'description' => 'Company contact'
    ];

    public function fields(): array
    {
        return [
            "gblContactId" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "contactTypeId" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "contactName" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "phoneVoice1" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "phoneVoice1Ext" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "phoneVoice2" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "phoneVoice2Ext" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "phoneFax" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "phoneCell" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "email" => [
                "type" => GraphQL::type('Email'),
                "description" => "",
            ],
            "description" => [
                "type" => Type::string(),
                "description" => "",
            ],
            "phoneVoice2ext" => [
                "type" => Type::string(),
                "description" => "",
            ],
        ];
    }
}
