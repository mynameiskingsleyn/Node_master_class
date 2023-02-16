<?php

namespace App\Modules\Search\Type\BankruptcyRecordExp\Statement;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class StatementIdRecType extends GraphQLType
{
    protected $attributes = [
        'name' => 'StatementIdRec',
        'description' => 'Statement Id Rec',
    ];

    public function fields(): array
    {
        return [
            'StatementId' => [
                "type" => Type::int(),
                "description" => "",
            ],
        ];
    }
}
