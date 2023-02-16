<?php

namespace App\Modules\Search\Type\JudgmentAndLienRecordExp;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class JudgmentAndLienRecordExpType extends GraphQLType
{
    protected $attributes = [
        'name' => 'JudgmentAndLienRecordExp',
        'description' => 'JudgmentAndLienRecord',
    ];

    public function fields(): array
    {
        return [
            'BusinessIds' => [
                'type' => GraphQL::type('BusinessIdentity'),
                'description' => ''
            ],
            'IdValue' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'RMSId' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'OriginFilingTime' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'TaxCode' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'Judge' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'ExternalKey' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'TMSId' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'MatchedParty' => [
                'type' => GraphQL::type('MatchedParty'),
                'description' => ''
            ],
            'IRSSerialNumber' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'OriginFilingNumber' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'OriginFilingType' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'OriginFilingDate' => [
                'type' => GraphQL::type('Date'),
                'description' => ''
            ],
            'CaseNumber' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'Eviction' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'Amount' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'FilingJurisdiction' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'FilingJurisdictionName' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'FilingState' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'FilingStatus' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'CertificateNumber' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'MultipleDefendant' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'JudgeSatisfiedDate' => [
                'type' => GraphQL::type('Date'),
                'description' => ''
            ],
            'SuitDate' => [
                'type' => GraphQL::type('Date'),
                'description' => ''
            ],
            'JudgeVacatedDate' => [
                'type' => GraphQL::type('Date'),
                'description' => ''
            ],
            'ReleaseDate' => [
                'type' => GraphQL::type('Date'),
                'description' => ''
            ],
            'LegalLot' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'LegalBlock' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'Debtors' => [
                'type' => GraphQL::type('Debtors'),
                'description' => ''
            ],
            'ThirdParties' => [
                'type' => GraphQL::type('ThirdParties'),
                'description' => ''
            ],
            'Creditors' => [
                'type' => GraphQL::type('Creditors'),
                'description' => ''
            ],
            'DebtorAttorneys' => [
                'type' => GraphQL::type('DebtorAttorneys'),
                'description' => ''
            ],
            'Filings' => [
                'type' => GraphQL::type('Filings'),
                'description' => ''
            ],
            'IsDisputed' => [
                'type' => Type::boolean(),
                'description' => ''
            ],
            'StatementIdRecs' => [
                'type' => GraphQL::type('StatementIdRecs'),
                'description' => ''
            ],
            'PersistentRecordId' => [
                'type' => Type::string(),
                'description' => ''
            ],

        ];
    }
}
