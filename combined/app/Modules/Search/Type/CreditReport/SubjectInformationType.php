<?php

namespace App\Modules\Search\Type\CreditReport;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use data_get;

class SubjectInformationType extends GraphQLType
{
    protected $attributes = [
        'name' => 'SubjectInformation',
        'description' => 'Individual Information',
    ];

    public function fields(): array
    {
        return [
            'Name' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    return data_get($value, '#document.RESPONSE_GROUP.RESPONSE.RESPONSE_DATA.CREDIT_RESPONSE.BORROWER.attributes.UnparsedName', null);
                }
            ],
            'FirstName' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    return data_get($value, '#document.RESPONSE_GROUP.RESPONSE.RESPONSE_DATA.CREDIT_RESPONSE.BORROWER.attributes.FirstName', null);
                }
            ],
            'LastName' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    return data_get($value, '#document.RESPONSE_GROUP.RESPONSE.RESPONSE_DATA.CREDIT_RESPONSE.BORROWER.attributes.LastName', null);
                }
            ],
            'MiddleName' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    return data_get($value, '#document.RESPONSE_GROUP.RESPONSE.RESPONSE_DATA.CREDIT_RESPONSE.BORROWER.attributes.MiddleName', null);
                }
            ],
            'BirthDate' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    return data_get($value, '#document.RESPONSE_GROUP.RESPONSE.RESPONSE_DATA.CREDIT_RESPONSE.BORROWER.attributes.BirthDate', null);
                }
            ],
            'Residence' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    return '';
                }
            ],
            'SSN' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    return data_get($value, '#document.RESPONSE_GROUP.RESPONSE.RESPONSE_DATA.CREDIT_RESPONSE.BORROWER.attributes.SSN', null);
                }
            ],

        ];
    }
}
