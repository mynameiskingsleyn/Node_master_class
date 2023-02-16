<?php

namespace App\Modules\Search\Type\BankruptcyRecordExp;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Modules\Shared\Traits\TypeHelperTrait;

class BankruptcyRecordPhonesType extends GraphQLType
{
    use TypeHelperTrait;

    protected $attributes = [
        'name' => 'BankruptcyRecordPhones',
        'description' => 'Phones',
    ];

    public function fields(): array
    {
        return [
            'Phone' => [
                'type' => Type::listOf(GraphQL::type('PhoneTimeZone')),
                'description' => '',
                'resolve' => function ($value) {
                    return $this->resolveArray($value, 'Phone');
                }
            ],
        ];
    }
}
