<?php

namespace App\Modules\Search\Type\Party;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class PartyType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Party',
        'description' => 'Party',
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
            'BusinessIds' => [
                'type' => GraphQL::type('BusinessIdentity'),
                'description' => '',
            ],
            'IdValue' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'Name' => [
                'type' => GraphQL::type('Name'),
                'description' => '',
            ],
            'CompanyName' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'UniqueId' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'BusinessId' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'SSN' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'FEIN' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'PersonFilterId' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'TaxId' => [
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
