<?php

namespace App\Modules\Search\Type\BankruptcyRecordExp;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class WithdrawnIndicatorType extends GraphQLType
{
    protected $attributes = [
        'name' => 'WithdrawnIndicator',
        'description' => 'Withdrawn Indicator',
    ];

    public function fields(): array
    {
        return [
            'WithdrawnID' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'WithdrawnDisposition' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'WithdrawnDate' => [
                'type' => GraphQL::type('Date'),
                'description' => '',
            ],
            'WithdrawnDispositionDate' => [
                'type' => GraphQL::type('Date'),
                'description' => '',
            ],
        ];
    }
}
