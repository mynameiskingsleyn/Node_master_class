<?php

namespace App\Modules\Search\Type\WatercraftRecord;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class WatercraftRecordType extends GraphQLType
{
    protected $attributes = [
        'name' => 'WatercraftRecord',
        'description' => 'WatercraftRecord',
    ];

    public function fields(): array
    {
        return [
            'boat_ver_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_state_origin' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_watercraft_id' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_watercraft_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_hull_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_watercraft_class_code' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_watercraft_class_description' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_model_year' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_use_description' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_propulsion_code' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_propulsion_description' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_title_state' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_title_status_description' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_title_type_description' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_title_issue_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_state_purchased' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_purchase_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_purchase_price' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_dealer' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_new_used_flag' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_st_registration' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_county_registration' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_registration_status_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_signatory' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_vehicle_type_code' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_vehicle_type_description' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_coast_guard_documented_flag' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_coast_guard_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_registration_status_description' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_registration_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_registration_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_registration_expiration_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_engine_3_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_engine_3_make' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_engine_3_model' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_engine_3_year' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_watercraft_hp_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_lien_name_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_lien_address_1_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_lien_address_2_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_lien_city_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_lien_state_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_lien_zip_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_lien_date_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_lien_indicator_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_lien_name_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_lien_address_1_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_lien_address_2_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_lien_city_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_lien_state_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_lien_zip_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_lien_date_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_lien_indicator_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_watercraft_length' => [
                'type' => Type::string(),
                'description' => '',
            ],

            // Non-FCRA Fields
            'boat_watercraft_key' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_sequence_key' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_source_code' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_hull_type_code' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_hull_type_description' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_watercraft_width' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_watercraft_weight' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_watercraft_make_code' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_watercraft_model_code' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_watercraft_color_1_code' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_watercraft_color_1_description' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_watercraft_color_2_code' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_watercraft_color_2_description' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_fuel_code' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_fuel_description' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_title_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_registration_renewal_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_decal_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_transaction_type_code' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_transaction_type_description' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_watercraft_toilet_description' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_registered_breadth' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_registered_depth' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_registered_gross_tons' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_registered_net_tons' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_main_hp_ahead' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_main_hp_astern' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_hailing_port' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_hailing_port_state' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_hailing_port_province' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_vessel_build_year' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_vessel_complete_build_city' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_vessel_complete_build_state' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_vessel_complete_build_province' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_vessel_complete_build_country' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_vessel_hull_build_city' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_vessel_hull_build_state' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_vessel_hull_build_province' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_vessel_hull_build_country' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_vessel_id' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_vessel_database_key' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_call_sign' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_imo_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_party_identification_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_itc_gross_tons' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_itc_net_tons' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_itc_length' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_itc_breadth' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_itc_depth' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_home_port_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_home_port_state' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_home_port_province' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_engine_1_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_engine_1_make' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_engine_1_model' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_engine_1_year' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_watercraft_hp_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_engine_2_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_engine_2_make' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_engine_2_model' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_engine_2_year' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_watercraft_hp_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_did_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_bdid_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_ultid_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_orgid_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_seleid_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_proxid_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_powid_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_empid_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_dotid_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_orig_name_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_orig_name_type_code_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_orig_name_type_description_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_orig_name_first_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_orig_name_middle_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_orig_name_last_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_orig_address_1_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_orig_address_2_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_orig_fips_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_orig_province_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_orig_country_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_dob_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_orig_ssn_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_orig_fein_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_gender_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_phone_1_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_phone_2_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_title_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_fname_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_mname_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_lname_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_name_suffix_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_company_name_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_prim_range_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_predir_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_prim_name_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_suffix_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_postdir_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_unit_desig_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_sec_range_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_p_city_name_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_v_city_name_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_st_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_zip5_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_zip4_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_county_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_did_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_bdid_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_ultid_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_orgid_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_seleid_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_proxid_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_powid_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_empid_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_dotid_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_orig_name_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_orig_name_type_code_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_orig_name_type_description_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_orig_name_first_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_orig_name_middle_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_orig_name_last_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_orig_address_1_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_orig_address_2_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_orig_fips_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_orig_province_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_orig_country_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_dob_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_orig_ssn_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_orig_fein_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_gender_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_phone_1_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_phone_2_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_title_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_fname_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_mname_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_lname_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_name_suffix_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_company_name_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_prim_range_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_predir_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_prim_name_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_suffix_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_postdir_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_unit_desig_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_sec_range_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_p_city_name_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_v_city_name_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_st_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_zip5_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_zip4_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_county_2' => [
                'type' => Type::string(),
                'description' => '',
            ],

            'boat_watercraft_make_description' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_watercraft_model_description' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_use_code' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_title_status_code' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_title_type_code' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_watercraft_number_of_engines' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'boat_registration_status_code' => [
                'type' => Type::string(),
                'description' => '',
            ],
        ];
    }
}
