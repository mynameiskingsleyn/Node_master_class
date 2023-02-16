<?php

namespace App\Modules\Search\Type\BankruptcyRecordExp;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Modules\Shared\Traits\TypeHelperTrait;

class BankruptcySearchNamesType extends GraphQLType
{
    use TypeHelperTrait;

    protected $attributes = [
        'name' => 'BankruptcySearchNames',
        'description' => 'Bankruptcy Names',
    ];

    public function fields(): array
    {
        return [
            'Name' => [
                'type' => Type::listOf(GraphQL::type('BankruptcySearchName')),
                'description' => '',
                'resolve' => function ($value) {
                    return $this->resolveArray($value, 'Name');
                }
            ],
        ];
    }
}
