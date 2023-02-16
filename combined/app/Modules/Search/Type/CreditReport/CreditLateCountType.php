<?php

namespace App\Modules\Search\Type\CreditReport;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CreditLateCountType extends GraphQLType
{
    protected $attributes = [
        'name' => 'CreditLateCount',
        'description' => 'CreditLateCount',
    ];

    public function fields(): array
    {
        return [
            'Days30' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    return is_array($value['30Days']) ? implode(', ', $value['30Days']) : ($value['30Days'] ?? '');
                }
            ],
            'Days60' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    return is_array($value['60Days']) ? implode(', ', $value['60Days']) : ($value['60Days'] ?? '');
                }
            ],
            'Days90' => [
                'type' => Type::string(),
                'description' => '',
                'resolve' => function ($value) {
                    return is_array($value['90Days']) ? implode(', ', $value['90Days']) : ($value['90Days'] ?? '');
                }
            ],
        ];
    }
}
