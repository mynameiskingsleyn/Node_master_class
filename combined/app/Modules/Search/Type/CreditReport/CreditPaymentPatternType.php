<?php

namespace App\Modules\Search\Type\CreditReport;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CreditPaymentPatternType extends GraphQLType
{
    protected $attributes = [
        'name' => 'CreditPaymentPattern',
        'description' => 'CreditPaymentPattern',
    ];

    public function fields(): array
    {
        return [
            'Data' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'StartDate' => [
                'type' => Type::string(),
                'description' => '',
            ],
        ];
    }
}
