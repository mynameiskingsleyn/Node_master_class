<?php

namespace App\Modules\Search\Type\CreditReport;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class BorrowerResidenceType extends GraphQLType
{
    protected $attributes = [
        'name' => 'BorrowerResidence',
        'description' => 'BorrowerResidence',
    ];

    public function fields(): array
    {
        return [
                'Location' => [
                    'type' => Type::string(),
                    'description' => '',
                    'resolve' => function ($value) {
                        return data_get($value, 'attributes.Location');
                    }
                ],
                'City' => [
                    'type' => Type::string(),
                    'description' => '',
                    'resolve' => function ($value) {
                        return data_get($value, 'attributes.City');
                    }
                ],
                'PostalCode' => [
                    'type' => Type::string(),
                    'description' => '',
                    'resolve' => function ($value) {
                        return data_get($value, 'attributes.PostalCode');
                    }
                ],
                'State' => [
                    'type' => Type::string(),
                    'description' => '',
                    'resolve' => function ($value) {
                        return data_get($value, 'attributes.State');
                    }
                ],
                'StreetAddress' => [
                    'type' => Type::string(),
                    'description' => '',
                    'resolve' => function ($value) {
                        return data_get($value, 'attributes.StreetAddress');
                    }
                ],
        ];
    }
}
