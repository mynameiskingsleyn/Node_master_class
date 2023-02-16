<?php

namespace App\Modules\Search\Type\CreditReport;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use data_get;

class CreditInquiryType extends GraphQLType
{
    protected $attributes = [
        'name' => 'CreditInquiry',
        'description' => 'CreditInquiry',
    ];

    public function fields(): array
    {
        return [
            'TradeRefID' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    return data_get($value, 'CreditTradeReferenceID');
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
            'SourceType' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    $sourceType = data_get($value, 'CREDIT_REPOSITORY.SourceType');
                    return $sourceType && is_array($sourceType) ? ($sourceType[0] ?? null) : ($sourceType ?? null);
                }
            ],
            'Name' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    return data_get($value, 'Name');
                }
            ],
            'Date' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    return data_get($value, 'Date');
                }
            ],
            'BusinessType' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    return data_get($value, 'CreditBusinessType');
                }
            ],
        ];
    }
}
