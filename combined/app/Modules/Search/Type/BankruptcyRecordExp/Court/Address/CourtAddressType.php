<?php

namespace App\Modules\Search\Type\BankruptcyRecordExp\Court\Address;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CourtAddressType extends GraphQLType
{
    protected $attributes = [
        'name' => 'CourtAddress',
        'description' => 'Bankruptcy Court Address',
    ];

    public function fields(): array
    {
        return [
            'Address' => [
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
            'Zip' => [
                "type" => Type::string(),
                "description" => "",
            ],
        ];
    }
}
