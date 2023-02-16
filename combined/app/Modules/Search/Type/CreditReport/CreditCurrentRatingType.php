<?php

namespace App\Modules\Search\Type\CreditReport;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CreditCurrentRatingType extends GraphQLType
{
    protected $attributes = [
        'name' => 'CreditCurrentRating',
        'description' => 'CreditCurrentRating',
    ];

    public function fields(): array
    {
        return [
            'Code' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'Type' => [
                'type' => Type::string(),
                'description' => '',
            ],
        ];
    }
}
