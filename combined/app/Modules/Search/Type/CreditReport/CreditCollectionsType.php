<?php

namespace App\Modules\Search\Type\CreditReport;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;
use data_get;

class CreditCollectionsType extends GraphQLType
{
    protected $attributes = [
        'name' => 'CreditCollections',
        'description' => 'CreditCollections',
    ];

    public function fields(): array
    {
        return [
            'CREDITOR' => [
                'type' => GraphQL::type('CreditorTrade'),
                'description' => '',
            ],
            'SubscriberCode' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    $SubscriberCode = data_get($value, 'CREDIT_REPOSITORY.SubscriberCode');
                    return $SubscriberCode && is_array($SubscriberCode) ? (implode(', ', $SubscriberCode) ?? null) : ($SubscriberCode ?? null);
                }
            ],
            'CreditBusinessType' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'AccountReportedDate' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'AccountStatusType' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'HighCreditAmount' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'UnpaidBalanceAmount' => [
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
