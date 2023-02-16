<?php

namespace App\Modules\Search\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Modules\Shared\Traits\TypeHelperTrait;

class PartiesType extends GraphQLType
{
    use TypeHelperTrait;

    protected $attributes = [
        'name' => 'Parties',
        'description' => 'Parties',
    ];

    public function fields(): array
    {
        return [
            'Party' => [
                'type' => Type::listOf(GraphQL::type('Party')),
                'description' => '',
                'resolve' => function ($value) {
                    return $this->resolveArray($value, 'Party');
                }
            ],
        ];
    }
}
