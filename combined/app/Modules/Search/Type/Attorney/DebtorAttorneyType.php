<?php

namespace App\Modules\Search\Type\Attorney;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class DebtorAttorneyType extends GraphQLType
{
    protected $attributes = [
        'name' => 'DebtorAttorney',
        'description' => 'Attorney',
    ];

    public function fields(): array
    {
        return [

            'HasCriminalConviction' => [
                'type' => Type::boolean(),
                'description' => '',
            ],
            'IsSexualOffender' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'Name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'Address' => [
                'type' => GraphQL::type('Address'),
                'description' => '',
            ],
            'Phone' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'TimeZone' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'Addresses' => [
                'type' => GraphQL::type('Addresses'),
                'description' => '',
            ],
            'Phones' => [
                'type' => GraphQL::type('PhoneTimeZones'),
                'description' => '',
            ],
            'ParsedParties' => [
                'type' => GraphQL::type('Parties'),
                'description' => '',
            ],
        ];
    }
}
