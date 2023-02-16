<?php

namespace App\Modules\Search\Type\Filing;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class FilingType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Filing',
        'description' => 'Filing',
    ];

    public function fields(): array
    {
        return [
            'Number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'Type' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'Date' => [
                'type' => GraphQL::type('Date'),
                'description' => '',
            ],
            'OriginFilingDate' => [
                'type' => GraphQL::type('Date'),
                'description' => '',
            ],
            'Book' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'Page' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'Agency' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'AgencyCity' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'AgencyState' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'AgencyCounty' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'FilingStatus' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'FilingDescription' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'FilingTime' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'IsDisputed' => [
                'type' => Type::boolean(),
                'description' => '',
            ],
            'StatementIdRecs' => [
                'type' => GraphQL::type('StatementIdRecs'),
                'description' => '',
            ],
        ];
    }
}
