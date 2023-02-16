<?php

namespace App\Modules\Search\Type\UtilityRecord;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class UtilityRecordType extends GraphQLType
{
    protected $attributes = [
        'name' => 'UtilityRecord',
        'description' => 'UtilityRecord',
    ];

    public function fields(): array
    {
        return [
            'util_type' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'util_category' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'util_type_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'util_connect_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'util_date_first_seen' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'util_record_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'util_name_first' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'util_name_middle' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'util_name_last' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'util_name_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'util_ssn' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'util_dob' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'util_drivers_license_state_code' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'util_drivers_license' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'util_work_phone' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'util_phone' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'util_addr_dual' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'util_addr_type_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'util_Address1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'util_City1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'util_State1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'util_ZipCode1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'util_county_name_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'util_addr_type_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'util_Address2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'util_City2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'util_State2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'util_ZipCode2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'util_county_name_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
        ];
    }
}
