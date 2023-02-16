<?php

namespace App\Modules\Search\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Modules\Shared\Traits\TypeHelperTrait;

class AttorneysType extends GraphQLType
{
    use TypeHelperTrait;

    protected $attributes = [
        'name' => 'Attorneys',
        'description' => 'Attorneys',
    ];

    public function fields(): array
    {
        return [
            'Attorney' => [
                'type' => Type::listOf(GraphQL::type('Attorney')),
                'description' => '',
                'resolve' => function ($value) {
                    return $this->resolveArray($value, 'Attorney');
                }
            ],
        ];
    }
}
