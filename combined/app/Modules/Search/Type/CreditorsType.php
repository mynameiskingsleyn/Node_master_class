<?php

namespace App\Modules\Search\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Modules\Shared\Traits\TypeHelperTrait;

class CreditorsType extends GraphQLType
{
    use TypeHelperTrait;

    protected $attributes = [
        'name' => 'Creditors',
        'description' => 'Creditors',
    ];

    public function fields(): array
    {
        return [
            'Creditor' => [
                'type' => Type::listOf(GraphQL::type('Creditor')),
                'description' => '',
                'resolve' => function ($value) {
                    return $this->resolveArray($value, 'Creditor');
                }
            ],
        ];
    }
}
