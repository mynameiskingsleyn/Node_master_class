<?php

namespace App\Modules\Search\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;

class JudgmentAndLienRecordsType extends GraphQLType
{
    protected $attributes = [
        'name' => 'JudgmentAndLienRecords',
        'description' => 'JudgmentAndLienRecords',
    ];

    public function fields(): array
    {
        return [
            'JudgmentAndLienRecord' => [
                'type' => Type::listOf(GraphQL::type('JudgmentAndLienRecord')),
                'description' => '',
                'resolve' => function ($value) {
                    return $value->JudgmentAndLienRecord ?? null;
                }
            ],
        ];
    }
}
