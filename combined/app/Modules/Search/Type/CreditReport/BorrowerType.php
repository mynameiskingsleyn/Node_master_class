<?php

namespace App\Modules\Search\Type\CreditReport;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;
use data_get;

class BorrowerType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Borrower',
        'description' => 'Borrower',
    ];

    public function fields(): array
    {
        return [
            'FirstName' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    $value = data_get($value, 'FirstName');
                    return $value && is_array($value) ? $value[0] : ($value ?? null);
                }
            ],
            'LastName' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    $value = data_get($value, 'LastName');
                    return $value && is_array($value) ? $value[0] : ($value ?? null);
                }
            ],
            'BirthDate' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    $value = data_get($value, 'BirthDate');
                    return $value && is_array($value) ? $value[0] : ($value ?? null);
                }
            ],
            'UnparsedName' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    $value = data_get($value, 'UnparsedName');
                    return $value && is_array($value) ? $value[0] : ($value ?? null);
                }
            ],
            'SSN' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    // GOVPROJS-1754 - Masking required by Experian for employment reports
                    return '*********';
                }
            ],
            'Aliases' => [
                'type' => Type::listOf(Graphql::type('Aliases')),
                'description' => '',
                'resolve' => function ($value) {
                    $data = data_get($value, 'ALIAS', []);

                    return $data;
                }
            ],
            'Residence' => [
                'type' => Type::listOf(Graphql::type('Residence')),
                'description' => '',
                'resolve' => function ($value) {
                    $data = data_get($value, 'RESIDENCE', []);

                    return $data;
                }
            ],
            'Employer' => [
                'type' => Type::listOf(Graphql::type('Employer')),
                'description' => '',
                'resolve' => function ($value) {
                    $data = data_get($value, 'EMPLOYER', []);

                    return $data;
                }
            ],
        ];
    }
}
