<?php

namespace App\Modules\Search\Type\SexOffenderRecord;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class SexOffenderRecordType extends GraphQLType
{
    protected $attributes = [
        'name' => 'SexOffenderRecord',
        'description' => 'SexOffenderRecord',
    ];

    public function fields(): array
    {
        return [
            'sof_ver_date' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_last_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_first_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_middle_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_suffix_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_address_last_seen' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_dob' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_offender_id' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_orig_state' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_docket_number' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_offense_1' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_conviction_place_1' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_conviction_date_1' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_victim_minor_1' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_conviction_jurisdiction_1' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_case_number_1' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_offense_date_1' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_offense_2' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_conviction_place_2' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_conviction_date_2' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_victim_minor_2' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_conviction_jurisdiction_2' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_case_number_2' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_offense_date_2' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_offense_3' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_conviction_place_3' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_conviction_date_3' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_victim_minor_3' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_conviction_jurisdiction_3' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_case_number_3' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_offense_date_3' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_registration_address' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_registration_city' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_registration_state' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_registration_zip' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_registration_county' => [
                'type' => Type::string(),
                'description' => ''
            ],

            // Non-FCRA Fields
            'sof_name_suffix' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_address_1' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_address_2' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_address_3' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_date_last_seen' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_sex' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_hair_color' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_eye_color' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_scars' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_height' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_weight' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_race' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_state_of_origin' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_court_case_number_1' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_court_case_number_2' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_court_case_number_3' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_offense_4' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_conviction_place_4' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_conviction_date_4' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_victim_minor_4' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_conviction_jurisdiction_4' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_court_case_number_4' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_offense_date_4' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_offense_5' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_conviction_place_5' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_conviction_date_5' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_victim_minor_5' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_conviction_jurisdiction_5' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_court_case_number_5' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_offense_date_5' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_offense_6' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_conviction_place_6' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_conviction_date_6' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_victim_minor_6' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_conviction_jurisdiction_6' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_court_case_number_6' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_offense_date_6' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_offense_7' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_conviction_place_7' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_conviction_date_7' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_victim_minor_7' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_conviction_jurisdiction_7' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_court_case_number_7' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_offense_date_7' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_offense_8' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_conviction_place_8' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_conviction_date_8' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_victim_minor_8' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_conviction_jurisdiction_8' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_court_case_number_8' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_offense_date_8' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_offense_9' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_conviction_place_9' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_conviction_date_9' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_victim_minor_9' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_conviction_jurisdiction_9' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_court_case_number_9' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_offense_date_9' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_offense_10' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_conviction_place_10' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_conviction_date_10' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_victim_minor_10' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_conviction_jurisdiction_10' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_court_case_number_10' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_offense_date_10' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_curr_incar_flag' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_curr_parole_flag' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_curr_probation_flag' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_doc_number' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_Address' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_City' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_State' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'sof_Zip' => [
                'type' => Type::string(),
                'description' => ''
            ],
        ];
    }
}
