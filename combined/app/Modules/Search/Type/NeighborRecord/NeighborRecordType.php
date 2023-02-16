<?php

namespace App\Modules\Search\Type\NeighborRecord;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class NeighborRecordType extends GraphQLType
{
    protected $attributes = [
        'name' => 'NeighborRecord',
        'description' => 'NeighborRecord',
    ];

    public function fields(): array
    {
        return [
            'nbr_title_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'nbr_first_name_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'nbr_middle_name_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'nbr_last_name_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'nbr_name_suffix_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'nbr_address_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'nbr_city_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'nbr_state_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'nbr_zipcode_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'nbr_phone_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'nbr_title_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'nbr_first_name_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'nbr_middle_name_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'nbr_last_name_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'nbr_name_suffix_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'nbr_address_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'nbr_city_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'nbr_state_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'nbr_zipcode_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'nbr_phone_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'nbr_title_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'nbr_first_name_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'nbr_middle_name_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'nbr_last_name_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'nbr_name_suffix_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'nbr_address_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'nbr_city_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'nbr_state_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'nbr_zipcode_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'nbr_phone_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
        ];
    }
}
