<?php

namespace App\Modules\Search\Type\Party;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class ThirdPartyType extends GraphQLType
{
    protected $attributes = [
        'name' => 'ThirdParty',
        'description' => 'Third Party',
    ];

    public function fields(): array
    {
        return [
            'HasCriminalConviction' => [
                'type' => Type::boolean(),
                'description' => '',
            ],
            'IsSexualOffender' => [
                'type' => Type::boolean(),
                'description' => '',
            ],
            'OriginName' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'Address' => [
                'type' => GraphQL::type('Address'),
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
