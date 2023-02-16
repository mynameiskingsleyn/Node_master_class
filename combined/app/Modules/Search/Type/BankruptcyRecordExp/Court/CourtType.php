<?php

namespace App\Modules\Search\Type\BankruptcyRecordExp\Court;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CourtType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Court',
        'description' => 'Bankruptcy Court',
    ];

    public function fields(): array
    {
        return [
            'LegacyCourt' => [
                "type" => Type::string(),
                "description" => "",
            ],
            'Address' => [
                "type" => GraphQL::type('CourtAddress'),
                "description" => "",
            ],
            'Phone' => [
                "type" => Type::string(),
                "description" => "",
            ],
            'District' => [
                "type" => Type::string(),
                "description" => "",
            ],
            'FilingCity' => [
                "type" => Type::string(),
                "description" => "",
            ],
            'CourtCode' => [
                "type" => Type::string(),
                "description" => "",
            ],
            'CourtId' => [
                "type" => Type::string(),
                "description" => "",
            ],
        ];
    }
}
