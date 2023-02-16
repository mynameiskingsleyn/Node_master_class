<?php

namespace App\Modules\Search\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Modules\Shared\Traits\TypeHelperTrait;

class JudgmentAndLienRecordsExpType extends GraphQLType
{
    use TypeHelperTrait;

    protected $attributes = [
        'name' => 'JudgmentAndLienRecordsExp',
        'description' => 'JudgmentAndLienRecords',
    ];

    public function fields(): array
    {
        return [
            'JudgmentAndLienRecord' => [
                'type' => Type::listOf(GraphQL::type('JudgmentAndLienRecordExp')),
                'description' => '',
                'resolve' => function ($value) {
                    return $this->resolveArray($value, 'JudgmentAndLienRecord');
                }
            ],
        ];
    }
}
