<?php

namespace App\Modules\Search\Type\CreditReport;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class AliasesType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Aliases',
        'description' => 'Aliases',
    ];

    public function fields(): array
    {
        return [
                'FirstName' => [
                    'type' => Type::string(),
                    'description' => '',
                ],
                'LastName' => [
                    'type' => Type::string(),
                    'description' => '',
                ],
                'MiddleName' => [
                    'type' => Type::string(),
                    'description' => '',
                ],
        ];
    }
}
