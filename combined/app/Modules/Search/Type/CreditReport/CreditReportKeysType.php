<?php

namespace App\Modules\Search\Type\CreditReport;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CreditReportKeysType extends GraphQLType
{
    protected $attributes = [
        'name' => 'CreditReportKeys',
        'description' => 'CreditReportKeys',
    ];

    public function fields(): array
    {
        return [
                'TRANSACTION_ID' => [
                    'type' => Type::string(),
                    'description' => '',
                ],
                'SON' => [
                    'type' => Type::string(),
                    'description' => '',
                ],
                'SOI' => [
                    'type' => Type::string(),
                    'description' => '',
                ],
                'ITEM_NUMBER' => [
                    'type' => Type::string(),
                    'description' => '',
                ],
                'CASE_SERVICE' => [
                    'type' => Type::string(),
                    'description' => '',
                ],
                'CASETYPE' => [
                    'type' => Type::string(),
                    'description' => '',
                ],
                'CASECATEGORY' => [
                    'type' => Type::string(),
                    'description' => '',
                ],
                'CASENUMBER' => [
                    'type' => Type::string(),
                    'description' => '',
                ],
                'B01' => [
                    'type' => Type::string(),
                    'description' => '',
                ],
                'B02' => [
                    'type' => Type::string(),
                    'description' => '',
                ],
                'B03' => [
                    'type' => Type::string(),
                    'description' => '',
                ],
                'B04' => [
                    'type' => Type::string(),
                    'description' => '',
                ],
                'B05' => [
                    'type' => Type::string(),
                    'description' => '',
                ],
                'B06' => [
                    'type' => Type::string(),
                    'description' => '',
                ],
                'B07' => [
                    'type' => Type::string(),
                    'description' => '',
                ],
                'B08' => [
                    'type' => Type::string(),
                    'description' => '',
                ],
                'B09' => [
                    'type' => Type::string(),
                    'description' => '',
                ],
                'B10' => [
                    'type' => Type::string(),
                    'description' => '',
                ],
                'B11' => [
                    'type' => Type::string(),
                    'description' => '',
                ],
                'B12' => [
                    'type' => Type::string(),
                    'description' => '',
                ],
                'B13' => [
                    'type' => Type::string(),
                    'description' => '',
                ],
                'B14' => [
                    'type' => Type::string(),
                    'description' => '',
                ],
                'B15' => [
                    'type' => Type::string(),
                    'description' => '',
                ],
                'B16' => [
                    'type' => Type::string(),
                    'description' => '',
                ],
                'B17' => [
                    'type' => Type::string(),
                    'description' => '',
                ],
                'B27' => [
                    'type' => Type::string(),
                    'description' => '',
                ],
                'HIGHEST_RATING_ON_ANY_TRADE' => [
                    'type' => Type::string(),
                    'description' => '',
                ],
                'NUMBER_OF_TRADES_WITH_HIGHEST_RATING' => [
                    'type' => Type::string(),
                    'description' => '',
                ],
                'PUBLIC_RECORD_INFORMATION_PROVIDERS' => [
                    'type' => Type::string(),
                    'description' => '',
                ],
                'VERIFICATION_ERR' => [
                    'type' => Type::string(),
                    'description' => '',
                ],
                'TMS_SCORE' => [
                    'type' => Type::string(),
                    'description' => '',
                ],
                'TRADELINE_TOTAL_TRADELINES_USED' => [
                    'type' => Type::int(),
                    'description' => '',
                ],
                'TRADELINE_TOTAL_CREDIT_LIMIT' => [
                    'type' => Type::float(),
                    'description' => '',
                    'resolve' => function ($value) {
                        return \data_get($value, 'TRADELINE_TOTAL_CREDIT_LIMIT', 0);
                    }
                ],
                'TRADELINE_TOTAL_BALANCE' => [
                    'type' => Type::float(),
                    'description' => '',
                    'resolve' => function ($value) {
                        return \data_get($value, 'TRADELINE_TOTAL_BALANCE', 0);
                    }
                ],
                'TRADELINE_TOTAL_HIGH_CREDIT' => [
                    'type' => Type::float(),
                    'description' => '',
                    'resolve' => function ($value) {
                        return \data_get($value, 'TRADELINE_TOTAL_HIGH_CREDIT', 0);
                    }
                ],
                'TRADELINE_TOTAL_PAST_DUE' => [
                    'type' => Type::float(),
                    'description' => '',
                    'resolve' => function ($value) {
                        return \data_get($value, 'TRADELINE_TOTAL_PAST_DUE', 0);
                    }
                ],
                'DEROGATORY_TRADELINE_TOTAL_TRADELINES_USED' => [
                    'type' => Type::int(),
                    'description' => '',
                    'resolve' => function ($value) {
                        return \data_get($value, 'DEROGATORY_TRADELINE_TOTAL_TRADELINES_USED', 0);
                    }
                ],
                'DEROGATORY_TRADELINE_TOTAL_CREDIT_LIMIT' => [
                    'type' => Type::float(),
                    'description' => '',
                    'resolve' => function ($value) {
                        return \data_get($value, 'DEROGATORY_TRADELINE_TOTAL_CREDIT_LIMIT', 0);
                    }
                ],
                'DEROGATORY_TRADELINE_TOTAL_BALANCE' => [
                    'type' => Type::float(),
                    'description' => '',
                    'resolve' => function ($value) {
                        return \data_get($value, 'DEROGATORY_TRADELINE_TOTAL_BALANCE', 0);
                    }
                ],
                'DEROGATORY_TRADELINE_TOTAL_HIGH_CREDIT' => [
                    'type' => Type::float(),
                    'description' => '',
                    'resolve' => function ($value) {
                        return \data_get($value, 'DEROGATORY_TRADELINE_TOTAL_HIGH_CREDIT', 0);
                    }
                ],
                'DEROGATORY_TRADELINE_TOTAL_PAST_DUE' => [
                    'type' => Type::float(),
                    'description' => '',
                    'resolve' => function ($value) {
                        return \data_get($value, 'DEROGATORY_TRADELINE_TOTAL_PAST_DUE', 0);
                    }
                ],
        ];
    }
}
