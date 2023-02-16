<?php

namespace App\Modules\Search\Type\AlertList;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class AlertListType extends GraphQLType
{
    protected $attributes = [
        'name' => 'AlertList',
        'description' => 'AlertList',
    ];

    public function fields(): array
    {
        return [
            'alert_security_freeze' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'alert_security_fraud' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'alert_identity_theft' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'alert_legal_flag' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'alert_cnsmr_statement' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'alert_data_under_dispute' => [
                'type' => Type::string(),
                'description' => '',
            ],
        ];
    }
}
