<?php

namespace App\Modules\Search\Type\CreditReport;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CreditorTradeType extends GraphQLType
{
    protected $attributes = [
        'name' => 'CreditorTrade',
        'description' => 'CreditorTrade',
    ];

    public function fields(): array
    {
        return [
            'Name' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    $value = data_get($value, 'Name');
                    return $value && is_array($value) ? $value[0] : ($value ?? null);
                }
            ],
            'City' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'PostalCode' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'State' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'StreetAddress' => [
                'type' => Type::string(),
                'description' => '',
            ],
        ];
    }
}
