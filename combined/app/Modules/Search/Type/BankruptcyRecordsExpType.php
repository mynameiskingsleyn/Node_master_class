<?php

namespace App\Modules\Search\Type;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Modules\Shared\Traits\TypeHelperTrait;

class BankruptcyRecordsExpType extends GraphQLType
{
    use TypeHelperTrait;

    protected $attributes = [
        'name' => 'BankruptcyRecordsExp',
        'description' => 'BankruptcyRecords',
    ];

    public function fields(): array
    {
        return [
            'BankruptcyRecord' => [
                'type' => Type::listOf(GraphQL::type('BankruptcyRecordExp')),
                'description' => '',
                'resolve' => function ($value) {
                    return $this->resolveArray($value, 'BankruptcyRecord');
                }
            ],
        ];
    }
}
