<?php

namespace App\Modules\Shared\Type\Company;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CompanyAddressType extends GraphQLType
{
    protected $attributes = [
        'name' => 'CompanyAddressType',
        'description' => 'Company address'
    ];

    public function fields(): array
    {
        return [
            "gblAddressId" => [
                "type" => Type::string(),
                "description" => "Global address identifier"
            ],
            "childId" => [
                "type" => Type::string(),
                "description" => ""
            ],
            "addressTypeId" => [
                "type" => Type::string(),
                "description" => "Address type"
            ],
            "streetAddress3" => [
                "type" => Type::string(),
                "description" => "Street address"
            ],
            "country" => [
                "type" => Type::string(),
                "description" => "Country"
            ],
            "zip4" => [
                "type" => Type::string(),
                "description" => "Zip code"
            ],
            "cleaned" => [
                "type" => Type::string(),
                "description" => "Cleaned"
            ],
            "streetAddress1" => [
                "type" => Type::string(),
                "description" => "Street address 1"
            ],
            "streetAddress2" => [
                "type" => Type::string(),
                "description" => "Street address 2"
            ],
            "city" => [
                "type" => Type::string(),
                "description" => "City"
            ],
            "state" => [
                "type" => Type::string(),
                "description" => "State"
            ],
            "zip" => [
                "type" => Type::string(),
                "description" => "Zip Code"
            ],
            "addressCategory" => [
                "type" => Type::string(),
                "description" => "Category of the address"
            ],
            "description" => [
                "type" => Type::string(),
                "description" => ""
            ],
        ];
    }
}
