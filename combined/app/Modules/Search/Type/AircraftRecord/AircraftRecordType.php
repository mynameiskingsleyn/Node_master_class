<?php

namespace App\Modules\Search\Type\AircraftRecord;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class AircraftRecordType extends GraphQLType
{
    protected $attributes = [
        'name' => 'AircraftRecord',
        'description' => 'AircraftRecord',
    ];

    public function fields(): array
    {
        return [
            'air_fract_owner' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_type_registrant' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_street' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_street2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_city' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_state' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_zip_code' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_region' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_county_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_country' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_title' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_fname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_mname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_lname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_name_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_compname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_current_flag_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_n_number_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_serial_number_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_mfr_mdl_code_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_year_mfr_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_last_action_date_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_cert_issue_date_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_certification_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_mode_s_code_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_aircraft_mfr_model_code_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_aircraft_mfr_name_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_ac_model_name_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_number_of_engines_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_number_of_seats_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_aircraft_weight_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_aircraft_cruising_speed_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_engine_type_mapped_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_aircraft_type_mapped_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_category_mapped_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_amateur_certification_mapped_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_engine_mfr_model_code_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_engine_mfr_name_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_eng_model_name_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_engine_hp_or_thrust_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_fuel_consumed_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_current_flag_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_n_number_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_serial_number_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_mfr_mdl_code_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_year_mfr_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_last_action_date_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_cert_issue_date_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_certification_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_mode_s_code_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_aircraft_mfr_model_code_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_aircraft_mfr_name_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_ac_model_name_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_number_of_engines_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_number_of_seats_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_aircraft_weight_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_aircraft_cruising_speed_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_engine_type_mapped_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_aircraft_type_mapped_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_category_mapped_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_amateur_certification_mapped_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_engine_mfr_model_code_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_engine_mfr_name_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_eng_model_name_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_engine_hp_or_thrust_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_fuel_consumed_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_current_flag_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_n_number_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_serial_number_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_mfr_mdl_code_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_year_mfr_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_last_action_date_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_cert_issue_date_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_certification_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_mode_s_code_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_aircraft_mfr_model_code_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_aircraft_mfr_name_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_ac_model_name_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_number_of_engines_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_number_of_seats_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_aircraft_weight_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_aircraft_cruising_speed_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_engine_type_mapped_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_aircraft_type_mapped_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_category_mapped_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_amateur_certification_mapped_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_engine_mfr_model_code_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_engine_mfr_name_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_eng_model_name_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_engine_hp_or_thrust_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_fuel_consumed_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_current_flag_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_n_number_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_serial_number_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_mfr_mdl_code_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_year_mfr_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_last_action_date_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_cert_issue_date_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_certification_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_mode_s_code_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_aircraft_mfr_model_code_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_aircraft_mfr_name_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_ac_model_name_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_number_of_engines_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_number_of_seats_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_aircraft_weight_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_aircraft_cruising_speed_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_engine_type_mapped_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_aircraft_type_mapped_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_category_mapped_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_amateur_certification_mapped_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_engine_mfr_model_code_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_engine_mfr_name_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_eng_model_name_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_engine_hp_or_thrust_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_fuel_consumed_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_current_flag_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_n_number_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_serial_number_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_mfr_mdl_code_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_year_mfr_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_last_action_date_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_cert_issue_date_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_certification_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_mode_s_code_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_aircraft_mfr_model_code_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_aircraft_mfr_name_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_ac_model_name_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_number_of_engines_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_number_of_seats_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_aircraft_weight_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_aircraft_cruising_speed_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_engine_type_mapped_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_aircraft_type_mapped_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_category_mapped_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_amateur_certification_mapped_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_engine_mfr_model_code_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_engine_mfr_name_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_eng_model_name_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_engine_hp_or_thrust_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'air_fuel_consumed_5' => [
                'type' => Type::string(),
                'description' => '',
            ],
        ];
    }
}
