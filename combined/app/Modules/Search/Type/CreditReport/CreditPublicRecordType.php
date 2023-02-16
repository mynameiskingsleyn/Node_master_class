<?php

namespace App\Modules\Search\Type\CreditReport;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CreditPublicRecordType extends GraphQLType
{
    protected $attributes = [
        'name' => 'CreditPublicRecord',
        'description' => 'CreditPublicRecord',
    ];

    public function fields(): array
    {
        return [
            'BorrowerID' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'CreditFileID' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'CreditPublicRecordID' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'CreditTradeReferenceID' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'AccountOwnershipType' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'CourtName' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'DispositionType' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'FiledDate' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'LegalObligationAmount' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'PaidDate' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'CaseNumber' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    return $value['DocketIdentifier'] ?? '';
                }
            ],
            'CreditorClass' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    $creditor_class = '';

                    if (isset($value['Type'])) {
                        switch ($value['Type']) {
                            case 'TaxLienCity':
                                $creditor_class = 'CITY GOVT';
                                break;
                            case 'TaxLienCounty':
                                $creditor_class = 'COUNTY GOVT';
                                break;
                            case 'TaxLienState':
                                $creditor_class = 'STATE GOVT';
                                break;
                            case 'TaxLienFederal':
                                $creditor_class = 'FEDERAL GOVT';
                                break;
                            case 'TaxLienOther':
                                $creditor_class = 'OTHER';
                                break;
                            default:
                                break;
                        }
                    }

                    return $creditor_class;
                }
            ],
            'BankruptcyAssetsAmount' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'BankruptcyLiabilitiesAmount' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'PlaintiffName' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'Address' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'Type' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'SourceType' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    $sourceType = data_get($value, 'CREDIT_REPOSITORY.SourceType');
                    return $sourceType && is_array($sourceType) ? ($sourceType[0] ?? null) : ($sourceType ?? null);
                }
            ],
            'SubscriberCode' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    $SubscriberCode = data_get($value, 'CREDIT_REPOSITORY.SubscriberCode');
                    return $SubscriberCode && is_array($SubscriberCode) ? ($SubscriberCode[0] ?? null) : ($SubscriberCode ?? null);
                }
            ],
            'AccountPaidDate' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'AccountOpenedDate' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'LastActivityDate' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'TimeReportProcessed' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'DateReportProcessed' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'Chapter13Bankruptcy' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    return empty($value['Type']) === false && $value['Type'] === 'BankruptcyChapter13' ? 'Y' : '';
                },
            ],

        ];
    }
}
