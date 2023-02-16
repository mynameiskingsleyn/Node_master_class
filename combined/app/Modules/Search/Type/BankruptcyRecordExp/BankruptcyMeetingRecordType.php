<?php

namespace App\Modules\Search\Type\BankruptcyRecordExp;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;

class BankruptcyMeetingRecordType extends GraphQLType
{
    protected $attributes = [
        'name' => 'BankruptcyMeetingRecord',
        'description' => 'Meeting Record',
    ];

    public function fields(): array
    {
        return [
            'Date' => [
                'type' => GraphQL::type('Date'),
                'description' => '',
            ],
            'Time' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'Address' => [
                'type' => Type::string(),
                'description' => '',
            ],

        ];
    }
}
