<?php

namespace App\Modules\Search\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class ProfessionalLicenseRecordsType extends GraphQLType
{
    protected $attributes = [
        'name' => 'ProfessionalLicenseRecords',
        'description' => 'ProfessionalLicenseRecords',
    ];

    public function fields(): array
    {
        return [
            'ProfessionalLicenseRecord' => [
                'type' => Type::listOf(GraphQL::type('ProfessionalLicenseRecord')),
                'description' => '',
            ],
        ];
    }
}
