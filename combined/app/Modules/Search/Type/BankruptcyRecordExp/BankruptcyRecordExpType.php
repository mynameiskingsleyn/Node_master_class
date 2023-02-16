<?php

namespace App\Modules\Search\Type\BankruptcyRecordExp;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class BankruptcyRecordExpType extends GraphQLType
{
    protected $attributes = [
        'name' => 'BankruptcyRecordExp',
        'description' => 'Bankruptcy Record',
    ];

    public function fields(): array
    {
        return [
            'TMSId' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'CaseNumber' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'FullCaseNumber' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'CourtLocation' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'CourtCode' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'CaseType' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'FilingDate' => [
                'type' => GraphQL::type('Date'),
                'description' => '',
            ],
            'OriginalFilingDate' => [
                'type' => GraphQL::type('Date'),
                'description' => '',
            ],
            'ReopenDate' => [
                'type' => GraphQL::type('Date'),
                'description' => '',
            ],
            'ClosedDate' => [
                'type' => GraphQL::type('Date'),
                'description' => '',
            ],
            'MostRecentDate' => Fields\BankruptcyMostRecentDateField::class,
            'CourtName' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'FilingType' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'FilerType' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'CorpFlag' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'FilingStatus' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'FilingJurisdiction' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'Chapter' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'OriginalChapter' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'JudgeName' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'Meeting' => [
                'type' => GraphQL::type('BankruptcyMeetingRecord'),
                'description' => '',
                'resolve' => function ($value) {
                    return $value->Meeting ?? null;
                }
            ],
            'JudgeIdentification' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'ClaimsDeadline' => [
                'type' => GraphQL::type('Date'),
                'description' => '',
            ],
            'ComplaintDeadline' => [
                'type' => GraphQL::type('Date'),
                'description' => '',
            ],
            'DischargeDate' => [
                'type' => GraphQL::type('Date'),
                'description' => '',
            ],
            'Disposition' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'SelfRepresented' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'AssetsForUnsecured' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'Assets' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'Liabilities' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'SplitCase' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'FiledInError' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'DateReclosed' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'CaseId' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'BarDate' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'TransferIn' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'StatusHistory' => [
                'type' => GraphQL::type('StatusHistory'),
                'description' => '',
                'resolve' => function ($value) {
                    return $value->StatusHistory ?? null;
                }
            ],
            'Comments' => [
                'type' => GraphQL::type('Comments'),
                'description' => '',
                'resolve' => function ($value) {
                    return $value->Comments ?? null;
                }
            ],
            'Dockets' => [
                'type' => GraphQL::type('Dockets'),
                'description' => '',
                'resolve' => function ($value) {
                    return $value->Dockets ?? null;
                }
            ],
            'Trustee' => [
                'type' => GraphQL::type('Trustee'),
                'description' => '',
            ],
            'Attorneys' => [
                'type' => GraphQL::type('Attorneys'),
                'description' => '',
            ],
            'Debtors' => [
                'type' => GraphQL::type('Debtors'),
                'description' => '',
            ],
            'Court' => [
                'type' => GraphQL::type('Court'),
                'description' => '',
            ],
            'HasDocketInfo' => [
                'type' => Type::boolean(),
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
