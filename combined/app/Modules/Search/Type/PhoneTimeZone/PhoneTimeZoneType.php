<?php

namespace App\Modules\Search\Type\PhoneTimeZone;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class PhoneTimeZoneType extends GraphQLType
{
    protected $attributes = [
        'name' => 'PhoneTimeZone',
        'description' => 'Phone TimeZone',
    ];

    public function fields(): array
    {
        return [
            'Phone10' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'Fax' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'TimeZone' => [
                'type' => Type::string(),
                'description' => '',
            ],
        ];
    }
}
