<?php

namespace App\Modules\Search\Type\Subject\Address;

use Rebing\GraphQL\Support\InputType;
use GraphQL\Type\Definition\Type;

class AddressInput extends InputType
{
    protected $attributes = [
        'name' => 'AddressInput',
        'description' => 'Address of the individual',
    ];

    public function fields(): array
    {
        return [
            'StreetNumber' => [
                "type" => Type::string(),
                "description" => "",
            ],
            'StreetPreDirection' => [
                "type" => Type::string(),
                "description" => "",
            ],
            'StreetName' => [
                "type" => Type::string(),
                "description" => "",
            ],
            'StreetSuffix' => [
                "type" => Type::string(),
                "description" => "",
            ],
            'StreetPostDirection' => [
                "type" => Type::string(),
                "description" => "",
            ],
            'UnitDesignation' => [
                "type" => Type::string(),
                "description" => "",
            ],
            'UnitNumber' => [
                "type" => Type::string(),
                "description" => "",
            ],
            'StreetAddress1' => [
                "type" => Type::string(),
                "description" => "",
            ],
            'StreetAddress2' => [
                "type" => Type::string(),
                "description" => "",
            ],
            'City' => [
                "type" => Type::string(),
                "description" => "",
            ],
            'State' => [
                "type" => Type::string(),
                "description" => "",
            ],
            'Zip5' => [
                "type" => Type::string(),
                "description" => "",
            ],
            'Zip4' => [
                "type" => Type::string(),
                "description" => "",
            ],
            'County' => [
                "type" => Type::string(),
                "description" => "",
            ],
            'PostalCode' => [
                "type" => Type::string(),
                "description" => "",
            ],
            'StateCityZip' => [
                "type" => Type::string(),
                "description" => "",
            ],
            'Latitude' => [
                "type" => Type::string(),
                "description" => "",
            ],
            'Longitude' => [
                "type" => Type::string(),
                "description" => "",
            ],
        ];
    }
}
