<?php

namespace App\Modules\Search\Type\CreditReport;

use App\Services\Common\ProductModules;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Illuminate\Support\Facades\App;
use App\Services\User\AccountService;
use Carbon\Carbon;
use data_get;

class CreditTradesType extends GraphQLType
{
    protected $attributes = [
        'name' => 'CreditTrades',
        'description' => 'CreditTrades',
    ];

    public function fields(): array
    {
        return [
            'CREDITOR' => [
                'type' => GraphQL::type('CreditorTrade'),
                'description' => '',
            ],
            'CONTACT_POINT' => [
                'type' => GraphQL::type('ContactPoint'),
                'description' => ''
            ],
            'LATE_COUNT' => [
                'type' => GraphQL::type('CreditLateCount'),
                'description' => '',
            ],
            'PAYMENT_PATTERN' => [
                'type' => GraphQL::type('CreditPaymentPattern'),
                'description' => '',
            ],
            'CURRENT_RATING' => [
                'type' => GraphQL::type('CreditCurrentRating'),
                'description' => '',
            ],
            'CreditRepository' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    $sourceType = data_get($value, 'CREDIT_REPOSITORY.SourceType');
                    return $sourceType && is_array($sourceType) ? (implode(', ', $sourceType) ?? null) : ($sourceType ?? null);
                }
            ],
            'SubscriberCode' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    $SubscriberCode = data_get($value, 'CREDIT_REPOSITORY.SubscriberCode');
                    return $SubscriberCode && is_array($SubscriberCode) ? (implode(', ', $SubscriberCode) ?? null) : ($SubscriberCode ?? null);
                }
            ],
            'SourceBureaus' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    $source = data_get($value, 'CreditFileID');

                    if (is_array($source)) {
                        return null;
                    }

                    $bureaus = $source ? explode(' ', $source) : null;

                    if (!$bureaus) {
                        return null;
                    }

                    $bureaus_codes = [
                        'Efx01' => 'EFX',
                        'Tuc01' => 'TU',
                        'Xpn01' => 'XPN'
                    ];

                    $bureaus_names = array_map(
                        function ($code) use ($bureaus_codes) {
                            return $bureaus_codes[$code] ?? null;
                        },
                        $bureaus
                    );

                    return implode(', ', $bureaus_names);
                }
            ],
            'BorrowerID' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'CreditBusinessType' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'CreditFileID' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'CreditLiabilityID' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'CreditLoanType' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'CreditTradeReferenceID' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'AccountBalanceDate' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'AccountIdentifier' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    if (App::make(AccountService::class)->activeModule() === ProductModules::FBI) {
                        $showAccountIdBeforeDate = Carbon::create(config('app.show_acct_id_before_date'))->startOfDay();
                        $recordDate = Carbon::parse($value['ReportRef']->max_cr_date)->startOfDay();

                        if ($recordDate->lessThanOrEqualTo($showAccountIdBeforeDate)) {
                            return data_get($value, 'AccountIdentifier');
                        }
                    }
                    return null;
                }
            ],
            'AccountOpenedDate' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'AccountOwnershipType' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'AccountReportedDate' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'AccountStatusDate' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'AccountStatusType' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'AccountType' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'CreditLimitAmount' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'DerogatoryDataIndicator' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'HighCreditAmount' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'LastActivityDate' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'MonthlyPaymentAmount' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'MonthsReviewedCount' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'PastDueAmount' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'TermsDescription' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'TermsSourceType' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'UnpaidBalanceAmount' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'Creditor_Name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'CREDIT_COMMENT' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    $comments = data_get($value, 'CREDIT_COMMENT');

                    if (is_array($comments)) {
                        return implode(',', $comments);
                    }

                    if (is_string($comments)) {
                        return $comments;
                    }

                    return null;
                }
            ]
        ];
    }
}
