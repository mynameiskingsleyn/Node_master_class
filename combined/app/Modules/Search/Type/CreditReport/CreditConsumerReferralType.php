<?php

namespace App\Modules\Search\Type\CreditReport;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CreditConsumerReferralType extends GraphQLType
{
    protected $attributes = [
        'name' => 'CreditConsumerReferral',
        'description' => 'CreditConsumerReferral',
    ];

    public function fields(): array
    {
        return [
            'City' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'Name' => [
                'type' => Type::string(),
                'description' => '',
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
