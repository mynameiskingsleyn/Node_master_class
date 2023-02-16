<?php

namespace App\Modules\Search\Type\Debtor;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class DebtorType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Debtor',
        'description' => 'Debtor',
    ];

    public function fields(): array
    {
        return [
          //bankruptcy debtor
            'BusinessId' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'UniqueId' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'PersonFilterId' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'DebtorType' => [
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
            'SSNMatch' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'SSNMSrc' => [
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
            'DCodeDesc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'DispTypeDesc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'Chapter' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'StatusDate' => [
                'type' => GraphQL::type('Date'),
                'description' => '',
            ],
            'DateVacated' => [
                'type' => GraphQL::type('Date'),
                'description' => '',
            ],
            'DateTransferred' => [
                'type' => GraphQL::type('Date'),
                'description' => '',
            ],
            'ConvertedDate' => [
                'type' => GraphQL::type('Date'),
                'description' => '',
            ],
            'DischargeDate' => [
                'type' => GraphQL::type('Date'),
                'description' => '',
            ],
            'Names' => [
              'type' => GraphQL::type('BankruptcySearchNames'), // list of Names
              'description' => '',
              'resolve' => function ($value) {
                return $value->Names ?? null;
              }
            ],
            'Addresses' => [ // bandkrubtcy and lienJudgment debtor
              'type' => GraphQL::type('BankruptcyRecordAddresses'),
              'description' => '',
              'resolve' => function ($value) {
                return $value->Addresses ?? null;
              }
            ],
            'Phones' => [ // bankruptcy and lienJudgment debtor
              'type' => GraphQL::type('BankruptcyRecordPhones'),
              'description' => '',
              'resolve' => function ($value) {
                return $value->Phones ?? null;
              }
            ],
            'FilingType' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'IsDisputed' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'WithdrawnStatus' => [
                'type' => GraphQL::type('WithdrawnIndicator'),
                'description' => '',
            ],
            'StatementIdRecs' => [
                'type' => GraphQL::type('StatementIdRecs'),
                'description' => '',
                'resolve' => function ($value) {
                    return $value->statementIdRecs ?? null;
                }
            ],

            //LienJudgment Debtor only
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
            'ParsedParties' => [
                'type' => GraphQL::type('Parties'),
                'description' => '',
            ]
        ];
    }
}
