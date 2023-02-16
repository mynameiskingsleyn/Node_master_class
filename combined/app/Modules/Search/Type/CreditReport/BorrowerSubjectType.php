<?php

namespace App\Modules\Search\Type\CreditReport;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;
use data_get;

class BorrowerSubjectType extends GraphQLType
{
    protected $attributes = [
        'name' => 'BorrowerSubject',
        'description' => 'BorrowerSubject',
    ];

    public function fields(): array
    {
        return [
            'FirstName' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    $value = data_get($value, '0.attributes.FirstName');
                    return $value && is_array($value) ? implode(', ', $value) : $value;
                }
            ],
            'LastName' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    $value = data_get($value, '0.attributes.LastName');
                    return $value && is_array($value) ? implode(', ', $value) : $value;
                }
            ],
            'BirthDate' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    $value = data_get($value, '0.attributes.BirthDate');
                    return $value && is_array($value) ? implode(', ', $value) : $value;
                }
            ],
            'MiddleName' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    $value = data_get($value, '0.attributes.MiddleName');
                    return $value && is_array($value) ? implode(', ', $value) : $value;
                }
            ],
            'NameSuffix' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    $value = data_get($value, '0.attributes.NameSuffix');
                    return $value && is_array($value) ? implode(', ', $value) : $value;
                }
            ],
            'SSN' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    $value = data_get($value, '0.attributes.SSN');
                    return $value && is_array($value) ? implode(', ', $value) : $value;
                }
            ],
            'UnparsedName' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    $value = data_get($value, '0.attributes.UnparsedName');
                    return $value && is_array($value) ? implode(', ', $value) : $value;
                }
            ],
            'Residence' => [
                'type' => Type::listOf(GraphQL::type('BorrowerResidence')),
                'description' => '',
                'resolve' => function ($value) {
                    $value = data_get($value, 'RESIDENCE', []);
                    return $value;
                }
            ],
        ];
    }
}
