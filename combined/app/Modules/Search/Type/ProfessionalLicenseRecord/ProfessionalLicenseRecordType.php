<?php

namespace App\Modules\Search\Type\ProfessionalLicenseRecord;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class ProfessionalLicenseRecordType extends GraphQLType
{
    protected $attributes = [
        'name' => 'ProfessionalLicenseRecord',
        'description' => 'ProfessionalLicenseRecord',
    ];

    public function fields(): array
    {
        return [
            'pro_ver_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_date_first_seen' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_profession_or_board' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_license_type' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_license_status' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_license_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_issue_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_expiration_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_last_renewal_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_board_action_indicator' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_source_st' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_vendor' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_education_1_school_attended' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_education_1_dates_attended' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_education_1_degree' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_status_effective_dt' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_fname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_mname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_lname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_name_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_dob' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'phone' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_phone' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_address' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_city' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_state' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_zip' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_county' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_county_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_LN_Date_Last_Seen' => [
                'type' => Type::string(),
                'description' => '',
            ],

            // Non-FCRA Fields
            'pro_uniqueid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_npi' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_prolic_seq_id' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_ProviderId' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_sanc_id' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_DEANumber' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_taxid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_orig_license_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_status' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_orig_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_orig_former_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_company_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_orig_addr_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_orig_addr_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_orig_city' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_orig_st' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_orig_zip' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_additional_orig_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_additional_orig_additional_1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_additional_orig_additional_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_additional_orig_city' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_additional_orig_st' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_additional_orig_zip' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_did' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_bdid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_Phonetype' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_sex' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_best_ssn' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_action_status' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_date_last_seen' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_license_obtained_by' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_source_st_decoded' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_Address' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_City' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_State' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_ZipCode' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_title' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_action_complaint_violation_dt' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_action_complaint_violation_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_action_case_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_action_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_action_posting_status_dt' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_action_effective_dt' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_misc_other_id' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_education_continuing_education' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_education_1_curriculum' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_education_2_school_attended' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_education_2_dates_attended' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_education_2_curriculum' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_education_2_degree' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_education_3_school_attended' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_education_3_dates_attended' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_education_3_curriculum' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_education_3_degree' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_business_flag' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_misc_fax' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_misc_email' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_additional_phone' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_personal_race_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_misc_occupation' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_action_record_type' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_personal_pob_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_other_license_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_other_license_type' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_misc_practice_hours' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_misc_practice_type' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_additional_licensing_specifics' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pro_expired_flag' => [
                'type' => Type::string(),
                'description' => '',
            ],
        ];
    }
}
