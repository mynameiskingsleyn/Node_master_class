<?php

namespace App\Modules\Search\Type\Debtor;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Modules\Shared\Traits\TypeHelperTrait;

class DebtorAttorneysType extends GraphQLType
{
    use TypeHelperTrait;

    protected $attributes = [
        'name' => 'DebtorAttorneys',
        'description' => 'Debtor Attorneys',
    ];

    public function fields(): array
    {
        return [
            'Attorney' => [
                'type' => Type::listOf(GraphQL::type('DebtorAttorney')),
                'description' => '',
                'resolve' => function ($value) {
                    return $this->resolveArray($value, 'Attorney');
                }
            ],
        ];
    }
}
