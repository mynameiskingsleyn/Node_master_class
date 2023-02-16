<?php

namespace App\Modules\Search\Type\MatchedParty;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class MatchedPartyType extends GraphQLType
{
    protected $attributes = [
        'name' => 'MatchedParty',
        'description' => 'Matched Party',
    ];

    public function fields(): array
    {
        return [
            'PartyType' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'UniqueId' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'OriginName' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'ParsedParty' => [
                'type' => GraphQL::type('NameAndCompany'),
                'description' => '',
            ],
            'Address' => [
                'type' => GraphQL::type('Address'),
                'description' => '',
            ],
        ];
    }
}
