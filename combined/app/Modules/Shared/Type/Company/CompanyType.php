<?php

namespace App\Modules\Shared\Type\Company;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CompanyType extends GraphQLType
{
    protected $attributes = [
        'name' => 'CompanyType',
        'description' => 'Company'
    ];

    public function fields(): array
    {
        return [
            'companyInfo' => [
                'type' => GraphQL::type('CompanyInfoType'),
                'description' => '',
            ],
            'companyAddress' => [
                'type' => GraphQL::type('CompanyAddressType'),
                'description' => '',
            ],
            'companyContact' => [
                'type' => GraphQL::type('CompanyContactType'),
                'description' => '',
            ],
        ];
    }
}
