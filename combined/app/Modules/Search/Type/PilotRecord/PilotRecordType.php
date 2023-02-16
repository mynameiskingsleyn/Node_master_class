<?php

namespace App\Modules\Search\Type\PilotRecord;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class PilotRecordType extends GraphQLType
{
    protected $attributes = [
        'name' => 'PilotRecord',
        'description' => 'PilotRecord',
    ];

    public function fields(): array
    {
        return [
            'faa_date_first_seen_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_date_last_seen_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_current_flag_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_letter_code_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_record_type_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_pilot_rec_id_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_region_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_region_desc_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_country_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_med_class_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_med_class_desc_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_med_date_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_med_exp_date_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_best_ssn_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_title_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_fname_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_mname_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_lname_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_name_suffix_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_Address1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_City1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_State1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_ZipCode1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_county_name_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_airmen_id_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_date_first_seen_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_date_last_seen_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_current_flag_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_letter_code_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_record_type_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_pilot_rec_id_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_region_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_region_desc_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_country_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_med_class_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_med_class_desc_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_med_date_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_med_exp_date_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_best_ssn_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_title_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_fname_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_mname_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_lname_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_name_suffix_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_Address2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_City2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_State2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_ZipCode2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_county_name_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_airmen_id_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_date_first_seen_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_date_last_seen_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_current_flag_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_letter_code_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_record_type_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_pilot_rec_id_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_region_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_region_desc_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_country_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_med_class_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_med_class_desc_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_med_date_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_med_exp_date_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_best_ssn_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_title_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_fname_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_mname_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_lname_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_name_suffix_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_Address3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_City3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_State3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_ZipCode3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_county_name_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_airmen_id_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_date_first_seen_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_date_last_seen_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_current_flag_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_letter_code_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_record_type_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_pilot_rec_id_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_region_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_region_desc_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_country_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_med_class_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_med_class_desc_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_med_date_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_med_exp_date_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_best_ssn_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_title_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_fname_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_mname_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_lname_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_name_suffix_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_Address4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_City4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_State4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_ZipCode4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_county_name_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_airmen_id_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_date_first_seen_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_date_last_seen_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_current_flag_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_letter_code_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_record_type_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_pilot_rec_id_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_region_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_region_desc_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_country_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_med_class_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_med_class_desc_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_med_date_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_med_exp_date_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_best_ssn_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_title_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_fname_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_mname_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_lname_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_name_suffix_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_Address5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_City5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_State5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_ZipCode5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_county_name_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'faa_airmen_id_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
        ];
    }
}
