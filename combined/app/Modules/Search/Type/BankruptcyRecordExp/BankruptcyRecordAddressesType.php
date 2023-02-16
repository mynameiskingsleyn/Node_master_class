<?php

namespace App\Modules\Search\Type\BankruptcyRecordExp;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Modules\Shared\Traits\TypeHelperTrait;

class BankruptcyRecordAddressesType extends GraphQLType
{
    use TypeHelperTrait;

    protected $attributes = [
        'name' => 'BankruptcyRecordAddresses',
        'description' => 'Bankruptcy Names',
    ];

    public function fields(): array
    {
        return [
            'Address' => [
                'type' => Type::listOf(GraphQL::type('Address')),
                'description' => '',
                'resolve' => function ($value) {
                    return $this->resolveArray($value, 'Address');
                }
            ],
        ];
    }
}
