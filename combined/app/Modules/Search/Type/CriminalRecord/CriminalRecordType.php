<?php

namespace App\Modules\Search\Type\CriminalRecord;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class CriminalRecordType extends GraphQLType
{
    protected $attributes = [
        'name' => 'CriminalRecord',
        'description' => 'CriminalRecord',
    ];

    public function fields(): array
    {
        return [
                'crim_ver_date' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_source_state' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_data_type' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_case_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_offense_date_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_arrest_date_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_num_of_counts_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_offense_code_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_charge_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_offense_desc_1_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_offense_desc_2_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_add_offense_code_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_add_offense_desc_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_offense_type_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_offense_level_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_court_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_sentence_date_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_sentence_desc_1_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_sentence_desc_2_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_sentence_desc_3_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_sentence_desc_4_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_sentence_jail_time_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_sentence_status_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_admin_date_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_event_date_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_current_inmate_status_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_latest_admin_date_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_scheduled_release_date_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_actual_release_date_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_control_release_date_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_parole_event_date_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_parole_release_date_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_parole_current_status_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_parole_current_status_desc_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_parole_sentence_date_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_parole_scheduled_end_date_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_parole_actual_end_date_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_parole_location_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_case_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_offense_date_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_arrest_date_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_num_of_counts_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_offense_code_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_charge_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_offense_desc_1_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_offense_desc_2_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_add_offense_code_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_add_offense_desc_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_offense_type_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_offense_level_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_court_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_sentence_date_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_sentence_desc_1_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_sentence_desc_2_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_sentence_desc_3_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_sentence_desc_4_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_sentence_jail_time_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_sentence_status_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_adimin_date_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_event_date_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_current_inmate_status_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_latest_admin_date_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_scheduled_release_date_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_actual_release_date_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_control_release_date_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_parole_event_date_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_parole_release_date_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_parole_current_status_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_parole_current_status_desc_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_parole_sentence_date_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_parole_scheduled_end_date_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_parole_actual_end_date_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_parole_location_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_case_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_offense_date_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_arrest_date_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_num_of_counts_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_offense_code_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_charge_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_offense_desc_1_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_offense_desc_2_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_add_offense_code_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_add_offense_desc_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_offense_type_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_offense_level_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_court_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_sentence_date_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_sentence_desc_1_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_sentence_desc_2_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_sentence_desc_3_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_sentence_desc_4_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_sentence_jail_time_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_sentence_status_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_adimin_date_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_event_date_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_current_inmate_status_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_latest_admin_date_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_scheduled_release_date_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_actual_release_date_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_control_release_date_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_parole_event_date_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_parole_release_date_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_parole_current_status_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_parole_current_status_desc_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_parole_sentence_date_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_parole_scheduled_end_date_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_parole_actual_end_date_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_parole_location_3' => [
                'type' => Type::string(),
                'description' => ''
                ],

                // Non-FCRA Fields
                'crim_FullName' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_lname' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_fname' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_mname' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_pty_typ' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_citizenship' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_dle_num' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_fbi_num' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_ins_num' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_id_num' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_doc_num' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_dob' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_dob_alias' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_place_of_birth' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_street_address_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_street_address_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_street_address_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_street_address_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_street_address_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_curr_incar_flag' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_curr_parole_flag' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_curr_probation_flag' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_race' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_race_desc' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_sex' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_hair_color' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_hair_color_desc' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_eye_color' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_eye_color_desc' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_skin_color' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_skin_color_desc' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_height' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_weight' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_party_status' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_party_status_desc' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_datasource' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_Address' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_City' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_State' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_Zip' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_process_date' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_case_num_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_off_date_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_arr_date_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_off_code_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_chg_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_off_desc_1_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_off_desc_2_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_add_off_cd_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_add_off_desc_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_off_typ_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_off_lev_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_court_desc_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cty_conv_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_dt_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_comp_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_desc_1_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_desc_2_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_desc_3_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_desc_4_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_lgth_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_lgth_desc_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_inc_adm_dt_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_min_term_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_min_term_desc_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_max_term_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_max_term_desc_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_case_num_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_off_date_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_arr_date_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_off_code_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_chg_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_off_desc_1_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_off_desc_2_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_add_off_cd_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_add_off_desc_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_off_typ_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_off_lev_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_court_desc_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cty_conv_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_dt_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_comp_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_desc_1_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_desc_2_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_desc_3_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_desc_4_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_lgth_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_lgth_desc_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_inc_adm_dt_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_min_term_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_min_term_desc_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_max_term_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_max_term_desc_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_case_num_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_off_date_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_arr_date_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_off_code_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_chg_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_off_desc_1_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_off_desc_2_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_add_off_cd_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_add_off_desc_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_off_typ_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_off_lev_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_court_desc_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cty_conv_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_dt_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_comp_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_desc_1_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_desc_2_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_desc_3_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_desc_4_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_lgth_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_lgth_desc_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_inc_adm_dt_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_min_term_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_min_term_desc_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_max_term_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_max_term_desc_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_case_num_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_off_date_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_arr_date_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_num_of_counts_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_off_code_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_chg_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_off_desc_1_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_off_desc_2_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_add_off_cd_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_add_off_desc_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_off_typ_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_off_lev_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_court_desc_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cty_conv_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_dt_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_comp_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_desc_1_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_desc_2_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_desc_3_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_desc_4_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_lgth_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_lgth_desc_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_inc_adm_dt_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_min_term_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_min_term_desc_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_max_term_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_max_term_desc_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_case_num_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_off_date_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_arr_date_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_num_of_counts_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_off_code_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_chg_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_off_desc_1_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_off_desc_2_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_add_off_cd_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_add_off_desc_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_off_typ_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_off_lev_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_court_desc_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cty_conv_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_dt_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_comp_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_desc_1_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_desc_2_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_desc_3_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_desc_4_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_lgth_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_lgth_desc_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_inc_adm_dt_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_min_term_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_min_term_desc_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_max_term_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_max_term_desc_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_case_num_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_off_date_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_arr_date_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_num_of_counts_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_off_code_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_chg_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_off_desc_1_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_off_desc_2_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_add_off_cd_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_add_off_desc_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_off_typ_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_off_lev_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_court_desc_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cty_conv_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_dt_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_comp_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_desc_1_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_desc_2_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_desc_3_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_desc_4_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_lgth_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_stc_lgth_desc_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_inc_adm_dt_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_min_term_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_min_term_desc_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_max_term_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_max_term_desc_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_event_dt_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_presump_par_rel_desc_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_cur_stat_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_cur_stat_desc_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_st_dt_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_sch_end_dt_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_act_end_dt_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_cty_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_event_dt_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_presump_par_rel_desc_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_cur_stat_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_cur_stat_desc_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_st_dt_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_sch_end_dt_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_act_end_dt_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_cty_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_event_dt_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_presump_par_rel_desc_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_cur_stat_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_cur_stat_desc_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_st_dt_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_sch_end_dt_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_act_end_dt_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_cty_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_event_dt_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_presump_par_rel_desc_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_cur_stat_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_cur_stat_desc_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_st_dt_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_sch_end_dt_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_act_end_dt_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_cty_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_event_dt_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_presump_par_rel_desc_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_cur_stat_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_cur_stat_desc_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_st_dt_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_sch_end_dt_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_act_end_dt_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_cty_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_event_dt_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_presump_par_rel_desc_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_cur_stat_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_cur_stat_desc_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_st_dt_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_sch_end_dt_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_act_end_dt_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_par_cty_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_in_event_dt_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_sent_length_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_sent_length_desc_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cur_stat_inm_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cur_stat_inm_desc_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cur_loc_inm_cd_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cur_loc_inm_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cur_sec_class_dt_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cur_loc_sec_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_gain_time_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_gain_time_eff_dt_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_latest_adm_dt_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_sch_rel_dt_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_act_rel_dt_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_ctl_rel_dt_1' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_in_event_dt_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_sent_length_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_sent_length_desc_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cur_stat_inm_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cur_stat_inm_desc_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cur_loc_inm_cd_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cur_loc_inm_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cur_sec_class_dt_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cur_loc_sec_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_gain_time_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_gain_time_eff_dt_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_latest_adm_dt_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_sch_rel_dt_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_act_rel_dt_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_ctl_rel_dt_2' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_in_event_dt_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_sent_length_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_sent_length_desc_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cur_stat_inm_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cur_stat_inm_desc_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cur_loc_inm_cd_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cur_loc_inm_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cur_sec_class_dt_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cur_loc_sec_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_gain_time_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_gain_time_eff_dt_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_latest_adm_dt_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_sch_rel_dt_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_act_rel_dt_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_ctl_rel_dt_3' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_in_event_dt_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_sent_length_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_sent_length_desc_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cur_stat_inm_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cur_stat_inm_desc_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cur_loc_inm_cd_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cur_loc_inm_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cur_sec_class_dt_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cur_loc_sec_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_gain_time_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_gain_time_eff_dt_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_latest_adm_dt_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_sch_rel_dt_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_act_rel_dt_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_ctl_rel_dt_4' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_in_event_dt_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_sent_length_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_sent_length_desc_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cur_stat_inm_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cur_stat_inm_desc_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cur_loc_inm_cd_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cur_loc_inm_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cur_sec_class_dt_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cur_loc_sec_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_gain_time_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_gain_time_eff_dt_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_latest_adm_dt_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_sch_rel_dt_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_act_rel_dt_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_ctl_rel_dt_5' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_in_event_dt_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_sent_length_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_sent_length_desc_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cur_stat_inm_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cur_stat_inm_desc_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cur_loc_inm_cd_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cur_loc_inm_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cur_sec_class_dt_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_cur_loc_sec_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_gain_time_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_gain_time_eff_dt_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_latest_adm_dt_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_sch_rel_dt_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_act_rel_dt_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
                'crim_ctl_rel_dt_6' => [
                'type' => Type::string(),
                'description' => ''
                ],
            ];
    }
}
