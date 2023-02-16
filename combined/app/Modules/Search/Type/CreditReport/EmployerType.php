<?php

namespace App\Modules\Search\Type\CreditReport;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class EmployerType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Employer',
        'description' => 'Employer',
    ];

    public function fields(): array
    {
        return [
                'EmploymentCurrentIndicator' => [
                    'type' => Type::string(),
                    'description' => '',
                ],
                'EmploymentReportedDate' => [
                    'type' => Type::string(),
                    'description' => '',
                ],
                'Name' => [
                    'type' => Type::string(),
                    'description' => '',
                ],
                'City' => [
                    'type' => Type::string(),
                    'description' => '',
                ],
                'State' => [
                    'type' => Type::string(),
                    'description' => '',
                ],
        ];
    }
}
