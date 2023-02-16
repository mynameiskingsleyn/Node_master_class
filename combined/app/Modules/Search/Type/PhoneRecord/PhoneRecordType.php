<?php

namespace App\Modules\Search\Type\PhoneRecord;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class PhoneRecordType extends GraphQLType
{
    protected $attributes = [
        'name' => 'PhoneRecord',
        'description' => 'PhoneRecord',
    ];

    public function fields(): array
    {
        return [
            'pho_ver_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pho_dt_first_seen' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pho_name_first' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pho_name_middle' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pho_name_last' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pho_name_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pho_address' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pho_city' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pho_state' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pho_phone' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pho_zip' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pho_listing_type_bus' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pho_listing_type_res' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pho_listing_type_gov' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pho_publish_code' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pho_disc_cnt12' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pho_LN_Date_Last_Seen' => [
                'type' => Type::string(),
                'description' => '',
            ],

            // Non-FCRA Fields
            'subj_first' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'subj_middle' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'subj_last' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'subj_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'subj_phone' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'subj_phone_listing_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'subj_phone_possible_relationship' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'subj_date_first_seen' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'subj_date_last_seen' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'subj_phone_type' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'subj_phone_carrier' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'subj_phone_carrier_city' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'subj_phone_carrier_state' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'subj_phone_search_level_code' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'subj_phone_duplicate_to_input_flag' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'subj_phone_line_type' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'subj_phone_possible_timezone' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'subj_phone_address_zipcode_timezone' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'subj_timezone_match_flag' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'subj_phone_ported_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'subj_phone_seen_freq' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'subj_phone_age' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'subj_phone_match_code' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'subj_phone_transient_flag' => [
                'type' => Type::string(),
                'description' => '',
            ],
        ];
    }
}
