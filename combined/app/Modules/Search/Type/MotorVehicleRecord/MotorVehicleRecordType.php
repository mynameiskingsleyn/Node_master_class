<?php

namespace App\Modules\Search\Type\MotorVehicleRecord;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class MotorVehicleRecordType extends GraphQLType
{
    protected $attributes = [
        'name' => 'MotorVehicleRecord',
        'description' => 'MotorVehicleRecord',
    ];

    public function fields(): array
    {
        return [
            'mvr_vendor_first_reported_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_vendor_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_vin' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_model_year' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_make_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_vehicle_type_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_series_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_model_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_body_style_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_major_color_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_minor_color_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_BASE_PRICE' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_Safety_type' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_AIRBAGS' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_TOD_flag' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_Min_Door_count' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_AIRBAG_DRIVER' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_AIRBAG_FRONT_DRIVER_SIDE' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_AIRBAG_FRONT_HEAD_CURTAIN' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_AIRBAG_FRONT_PASS' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_AIRBAG_FRONT_PASS_SIDE' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_documenttypecode' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_orig_net_weight' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_vina_vp_air_conditioning_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_vina_vp_power_steering_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_vina_vp_power_brakes_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_vina_vp_power_windows_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_vina_vp_tilt_wheel_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_vina_vp_roof_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_vina_vp_optional_roof1_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_vina_vp_optional_roof2_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_vina_vp_radio_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_vina_vp_optional_radio1_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_vina_vp_optional_radio2_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_vina_vp_transmission_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_vina_vp_optional_transmission1_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_vina_vp_optional_transmission2_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_vina_vp_anti_lock_brakes_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_vina_vp_front_wheel_drive_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_vina_vp_four_wheel_drive_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_vina_vp_security_system_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_vina_vp_daytime_running_lights_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_vina_number_of_cylinders' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_vina_engine_size' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_fuel_type_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_true_license_plate' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_license_plate' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_license_plate_type_code' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_license_plate_type_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_license_state' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_previous_license_plate' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_previous_license_state' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_first_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_earliest_effective_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_latest_effective_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_latest_expiration_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_decal_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_ttl_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_ttl_earliest_issue_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_ttl_latest_issue_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_ttl_previous_issue_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_ttl_status_code' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_ttl_status_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_ttl_odometer_mileage' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_1_title' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_1_fname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_1_mname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_1_lname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_1_name_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_1_orig_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_1_orig_sex' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_1_did' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_1_driver_license_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_1_dob' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_1_ssn' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_1_company_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_1_bdid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_1_fein' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_1_addr1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_1_addr2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_1_v_city_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_1_city' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_1_state' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_1_zip' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_1_county' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_1_src_first_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_1_src_last_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_1_ultid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_1_orgid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_1_seleid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_1_proxid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_1_powid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_1_empid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_1_dotid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_1_title' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_1_fname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_1_mname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_1_lname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_1_name_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_1_orig_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_1_orig_sex' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_1_did' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_1_driver_license_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_1_dob' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_1_ssn' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_1_company_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_1_bdid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_1_fein' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_1_addr1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_1_addr2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_1_v_city_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_1_city' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_1_state' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_1_zip' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_1_county' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_1_ultid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_1_orgid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_1_seleid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_1_proxid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_1_powid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_1_empid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_1_dotid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_1_title' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_1_fname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_1_mname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_1_lname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_1_name_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_1_lien_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_1_orig_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_1_orig_sex' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_1_did' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_1_driver_license_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_1_dob' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_1_ssn' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_1_company_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_1_bdid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_1_fein' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_1_addr1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_1_addr2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_1_v_city_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_1_city' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_1_state' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_1_zip' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_1_county' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_1_ultid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_1_orgid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_1_seleid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_1_proxid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_1_powid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_1_empid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_1_dotid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_1_title' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_1_fname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_1_mname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_1_lname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_1_name_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_1_orig_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_1_orig_sex' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_1_did' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_1_driver_license_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_1_dob' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_1_ssn' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_1_company_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_1_bdid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_1_fein' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_1_addr1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_1_addr2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_1_v_city_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_1_city' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_1_state' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_1_zip' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_1_county' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_1_ultid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_1_orgid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_1_seleid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_1_proxid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_1_powid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_1_empid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_1_dotid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_1_title' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_1_fname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_1_mname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_1_lname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_1_name_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_1_orig_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_1_orig_sex' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_1_did' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_1_driver_license_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_1_dob' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_1_ssn' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_1_company_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_1_bdid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_1_fein' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_1_addr1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_1_addr2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_1_v_city_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_1_city' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_1_state' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_1_zip' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_1_county' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_1_ultid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_1_orgid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_1_seleid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_1_proxid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_1_powid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_1_empid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_1_dotid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_2_title' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_2_fname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_2_mname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_2_lname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_2_name_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_2_orig_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_2_orig_sex' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_2_did' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_2_driver_license_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_2_dob' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_2_ssn' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_2_company_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_2_bdid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_2_fein' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_2_addr1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_2_addr2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_2_v_city_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_2_city' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_2_state' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_2_zip' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_2_county' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_2_src_first_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_2_src_last_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_2_ultid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_2_orgid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_2_seleid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_2_proxid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_2_powid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_2_empid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_2_dotid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_2_title' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_2_fname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_2_mname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_2_lname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_2_name_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_2_orig_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_2_orig_sex' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_2_did' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_2_driver_license_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_2_dob' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_2_ssn' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_2_company_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_2_bdid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_2_fein' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_2_addr1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_2_addr2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_2_v_city_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_2_city' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_2_state' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_2_zip' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_2_county' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_2_ultid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_2_orgid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_2_seleid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_2_proxid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_2_powid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_2_empid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_2_dotid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_2_title' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_2_fname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_2_mname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_2_lname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_2_name_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_2_lien_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_2_orig_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_2_orig_sex' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_2_did' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_2_driver_license_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_2_dob' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_2_ssn' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_2_company_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_2_bdid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_2_fein' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_2_addr1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_2_addr2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_2_v_city_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_2_city' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_2_state' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_2_zip' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_2_county' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_2_ultid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_2_orgid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_2_seleid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_2_proxid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_2_powid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_2_empid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_2_dotid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_2_title' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_2_fname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_2_mname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_2_lname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_2_name_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_2_orig_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_2_orig_sex' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_2_did' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_2_driver_license_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_2_dob' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_2_ssn' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_2_company_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_2_bdid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_2_fein' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_2_addr1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_2_addr2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_2_v_city_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_2_city' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_2_state' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_2_zip' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_2_county' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_2_ultid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_2_orgid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_2_seleid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_2_proxid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_2_powid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_2_empid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_2_dotid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_2_title' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_2_fname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_2_mname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_2_lname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_2_name_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_2_orig_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_2_orig_sex' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_2_did' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_2_driver_license_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_2_dob' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_2_ssn' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_2_company_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_2_bdid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_2_fein' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_2_addr1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_2_addr2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_2_v_city_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_2_city' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_2_state' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_2_zip' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_2_county' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_2_ultid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_2_orgid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_2_seleid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_2_proxid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_2_powid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_2_empid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_2_dotid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_3_title' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_3_fname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_3_mname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_3_lname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_3_name_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_3_orig_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_3_orig_sex' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_3_did' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_3_driver_license_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_3_dob' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_3_ssn' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_3_company_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_3_bdid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_3_fein' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_3_addr1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_3_addr2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_3_v_city_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_3_city' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_3_state' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_3_zip' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_3_county' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_3_src_first_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_3_src_last_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_3_ultid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_3_orgid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_3_seleid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_3_proxid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_3_powid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_3_empid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_own_3_dotid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_3_title' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_3_fname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_3_mname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_3_lname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_3_name_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_3_orig_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_3_orig_sex' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_3_did' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_3_driver_license_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_3_dob' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_3_ssn' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_3_company_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_3_bdid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_3_fein' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_3_addr1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_3_addr2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_3_v_city_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_3_city' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_3_state' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_3_zip' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_3_county' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_3_ultid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_3_orgid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_3_seleid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_3_proxid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_3_powid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_3_empid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_reg_3_dotid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_3_title' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_3_fname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_3_mname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_3_lname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_3_name_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_3_lien_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_3_orig_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_3_orig_sex' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_3_did' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_3_driver_license_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_3_dob' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_3_ssn' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_3_company_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_3_bdid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_3_fein' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_3_addr1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_3_addr2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_3_v_city_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_3_city' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_3_state' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_3_zip' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_3_county' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_3_ultid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_3_orgid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_3_seleid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_3_proxid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_3_powid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_3_empid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lh_3_dotid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_3_title' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_3_fname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_3_mname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_3_lname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_3_name_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_3_orig_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_3_orig_sex' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_3_did' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_3_driver_license_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_3_dob' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_3_ssn' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_3_company_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_3_bdid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_3_fein' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_3_addr1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_3_addr2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_3_v_city_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_3_city' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_3_state' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_3_zip' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_3_county' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_3_ultid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_3_orgid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_3_seleid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_3_proxid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_3_powid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_3_empid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_le_3_dotid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_3_title' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_3_fname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_3_mname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_3_lname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_3_name_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_3_orig_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_3_orig_sex' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_3_did' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_3_driver_license_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_3_dob' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_3_ssn' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_3_company_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_3_bdid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_3_fein' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_3_addr1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_3_addr2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_3_v_city_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_3_city' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_3_state' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_3_zip' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_3_county' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_3_ultid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_3_orgid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_3_seleid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_3_proxid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_3_powid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_3_empid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'mvr_lo_3_dotid' => [
                'type' => Type::string(),
                'description' => '',
            ],
        ];
    }
}
