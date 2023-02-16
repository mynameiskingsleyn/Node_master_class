<?php

namespace App\Modules\Search\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Modules\Shared\Traits\TypeHelperTrait;

class DebtorsType extends GraphQLType
{
    use TypeHelperTrait;

    protected $attributes = [
        'name' => 'Debtors',
        'description' => 'Debtors',
    ];

    public function fields(): array
    {
        return [
            'Debtor' => [
                'type' => Type::listOf(GraphQL::type('Debtor')),
                'description' => '',
                'resolve' => function ($value) {
                    return $this->resolveArray($value, 'Debtor');
                }
            ],
        ];
    }
}
