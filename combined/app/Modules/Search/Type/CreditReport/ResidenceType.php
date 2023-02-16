<?php

namespace App\Modules\Search\Type\CreditReport;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class ResidenceType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Residence',
        'description' => 'Residence',
    ];

    public function fields(): array
    {
        return [
                'BorrowerResidencyType' => [
                    'type' => Type::string(),
                    'description' => '',
                ],
                'City' => [
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
