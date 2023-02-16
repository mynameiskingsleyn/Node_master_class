<?php

namespace App\Modules\Search\Type\BankruptcyRecordExp;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Modules\Shared\Traits\TypeHelperTrait;

class StatementIdRecsType extends GraphQLType
{
    use TypeHelperTrait;

    protected $attributes = [
        'name' => 'StatementIdRecs',
        'description' => 'Statement Id Recs',
    ];

    public function fields(): array
    {
        return [
            'StatementIdRec' => [
                'type' => Type::listOf(GraphQL::type('StatementIdRec')),
                'description' => '',
                'resolve' => function ($value) {
                    return $this->resolveArray($value, 'StatementIdRec');
                }
            ],
        ];
    }
}
