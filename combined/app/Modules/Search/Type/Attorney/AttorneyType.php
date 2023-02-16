<?php

namespace App\Modules\Search\Type\Attorney;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class AttorneyType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Attorney',
        'description' => 'Attorney',
    ];

    public function fields(): array
    {
        return [
            'BusinessId' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'UniqueId' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'SSN' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'AppendedSSN' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'TaxId' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'AppendedTaxId' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'Names' => [
                'type' => GraphQL::type('BankruptcySearchNames'),
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

            'Emails' => [
                'type' => GraphQL::type('Emails'),
                'description' => '',
            ],
        ];
    }
}
