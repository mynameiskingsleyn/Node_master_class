<?php

namespace App\Modules\Search\Type\JudgmentAndLienRecord;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class JudgmentAndLienRecordType extends GraphQLType
{
    protected $attributes = [
        'name' => 'JudgmentAndLienRecord',
        'description' => 'JudgmentAndLienRecord',
    ];

    public function fields(): array
    {
        return [
            'jnl_ver_date' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_state_filing_jurisdiction' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_orig_case_number' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_orig_filing_type' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_orig_filing_date' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_case_number' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_number' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_type_desc' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_date' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_party_names' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_release_date' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_case_amount' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_eviction' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_satisfied_date' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_vacated_date' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_agency' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_agency_state' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_case_county' => [
                'type' => Type::string(),
                'description' => ''
            ],

            // Non-FCRA Fields
            'jnl_filing_jurisdiction' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_jurisdiction_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_orig_filing_number' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_orig_filing_time' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_tax_code' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_irs_serial_number' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_amount' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_judg_satisfied_date' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_judg_vacated_date' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_judge' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_status' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_1_party_1_title' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_1_party_1_fname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_1_party_1_mname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_1_party_1_lname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_1_party_1_name_suffix' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_1_party_1_cname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_1_party_1_orig_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_1_party_1_ssn' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_1_party_1_tax_id' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_1_party_1_address1' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_1_party_1_address2' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_1_party_1_p_city_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_1_party_1_st' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_1_party_1_zip' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_1_party_1_zip4' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_1_party_1_msa' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_1_party_1_county_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_1_party_1_phone' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_1_party_2_title' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_1_party_2_fname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_1_party_2_mname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_1_party_2_lname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_1_party_2_name_suffix' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_1_party_2_cname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_1_party_2_ssn' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_1_party_2_tax_id' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_1_party_2_address1' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_1_party_2_address2' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_1_party_2_p_city_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_1_party_2_st' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_1_party_2_zip' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_1_party_2_zip4' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_1_party_2_msa' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_1_party_2_county_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_1_party_2_phone' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_2_party_1_title' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_2_party_1_fname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_2_party_1_mname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_2_party_1_lname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_2_party_1_name_suffix' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_2_party_1_cname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_2_party_1_orig_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_2_party_1_ssn' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_2_party_1_tax_id' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_2_party_1_address1' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_2_party_1_address2' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_2_party_1_p_city_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_2_party_1_st' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_2_party_1_zip' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_2_party_1_zip4' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_2_party_1_msa' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_2_party_1_county_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_2_party_1_phone' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_2_party_2_title' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_2_party_2_fname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_2_party_2_mname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_2_party_2_lname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_2_party_2_name_suffix' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_2_party_2_cname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_2_party_2_ssn' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_2_party_2_tax_id' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_2_party_2_address1' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_2_party_2_address2' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_2_party_2_p_city_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_2_party_2_st' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_2_party_2_zip' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_2_party_2_zip4' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_2_party_2_msa' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_2_party_2_county_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_2_party_2_phone' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_3_party_1_title' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_3_party_1_fname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_3_party_1_mname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_3_party_1_lname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_3_party_1_name_suffix' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_3_party_1_cname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_3_party_1_orig_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_3_party_1_ssn' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_3_party_1_tax_id' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_3_party_1_address1' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_3_party_1_address2' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_3_party_1_p_city_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_3_party_1_st' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_3_party_1_zip' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_3_party_1_zip4' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_3_party_1_msa' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_3_party_1_county_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_3_party_1_phone' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_3_party_2_title' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_3_party_2_fname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_3_party_2_mname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_3_party_2_lname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_3_party_2_name_suffix' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_3_party_2_cname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_3_party_2_ssn' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_3_party_2_tax_id' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_3_party_2_address1' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_3_party_2_address2' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_3_party_2_p_city_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_3_party_2_st' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_3_party_2_zip' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_3_party_2_zip4' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_3_party_2_msa' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_3_party_2_county_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_3_party_2_phone' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_4_party_1_title' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_4_party_1_fname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_4_party_1_mname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_4_party_1_lname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_4_party_1_name_suffix' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_4_party_1_cname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_4_party_1_orig_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_4_party_1_ssn' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_4_party_1_tax_id' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_4_party_1_address1' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_4_party_1_address2' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_4_party_1_p_city_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_4_party_1_st' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_4_party_1_zip' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_4_party_1_zip4' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_4_party_1_msa' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_4_party_1_county_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_4_party_1_phone' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_4_party_2_title' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_4_party_2_fname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_4_party_2_mname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_4_party_2_lname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_4_party_2_name_suffix' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_4_party_2_cname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_4_party_2_ssn' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_4_party_2_tax_id' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_4_party_2_address1' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_4_party_2_address2' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_4_party_2_p_city_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_4_party_2_st' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_4_party_2_zip' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_4_party_2_zip4' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_4_party_2_msa' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_4_party_2_county_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_4_party_2_phone' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_5_party_1_title' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_5_party_1_fname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_5_party_1_mname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_5_party_1_lname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_5_party_1_name_suffix' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_5_party_1_cname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_5_party_1_orig_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_5_party_1_ssn' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_5_party_1_tax_id' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_5_party_1_address1' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_5_party_1_address2' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_5_party_1_p_city_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_5_party_1_st' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_5_party_1_zip' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_5_party_1_zip4' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_5_party_1_msa' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_5_party_1_county_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_5_party_1_phone' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_5_party_2_title' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_5_party_2_fname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_5_party_2_mname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_5_party_2_lname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_5_party_2_name_suffix' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_5_party_2_cname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_5_party_2_ssn' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_5_party_2_tax_id' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_5_party_2_address1' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_5_party_2_address2' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_5_party_2_p_city_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_5_party_2_st' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_5_party_2_zip' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_5_party_2_zip4' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_5_party_2_msa' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_5_party_2_county_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_5_party_2_phone' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_6_party_1_title' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_6_party_1_fname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_6_party_1_mname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_6_party_1_lname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_6_party_1_name_suffix' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_6_party_1_cname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_6_party_1_orig_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_6_party_1_ssn' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_6_party_1_tax_id' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_6_party_1_address1' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_6_party_1_address2' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_6_party_1_p_city_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_6_party_1_st' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_6_party_1_zip' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_6_party_1_zip4' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_6_party_1_msa' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_6_party_1_county_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_6_party_1_phone' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_6_party_2_title' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_6_party_2_fname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_6_party_2_mname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_6_party_2_lname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_6_party_2_name_suffix' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_6_party_2_cname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_6_party_2_ssn' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_6_party_2_tax_id' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_6_party_2_address1' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_6_party_2_address2' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_6_party_2_p_city_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_6_party_2_st' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_6_party_2_zip' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_6_party_2_zip4' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_6_party_2_msa' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_6_party_2_county_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_6_party_2_phone' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_7_party_1_title' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_7_party_1_fname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_7_party_1_mname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_7_party_1_lname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_7_party_1_name_suffix' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_7_party_1_cname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_7_party_1_orig_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_7_party_1_ssn' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_7_party_1_tax_id' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_7_party_1_address1' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_7_party_1_address2' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_7_party_1_p_city_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_7_party_1_st' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_7_party_1_zip' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_7_party_1_zip4' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_7_party_1_msa' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_7_party_1_county_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_7_party_1_phone' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_7_party_2_title' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_7_party_2_fname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_7_party_2_mname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_7_party_2_lname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_7_party_2_name_suffix' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_7_party_2_cname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_7_party_2_ssn' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_7_party_2_tax_id' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_7_party_2_address1' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_7_party_2_address2' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_7_party_2_p_city_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_7_party_2_st' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_7_party_2_zip' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_7_party_2_zip4' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_7_party_2_msa' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_7_party_2_county_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_debtor_7_party_2_phone' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_creditor_title' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_creditor_fname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_creditor_mname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_creditor_lname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_creditor_name_suffix' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_creditor_cname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_creditor_orig_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_creditor_address1' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_creditor_address2' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_creditor_p_city_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_creditor_st' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_creditor_zip' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_creditor_zip4' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_creditor_msa' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_creditor_county_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_creditor_phone' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_attorney_title' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_attorney_fname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_attorney_mname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_attorney_lname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_attorney_name_suffix' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_attorney_cname' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_attorney_orig_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_attorney_address1' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_attorney_address2' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_attorney_p_city_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_attorney_st' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_attorney_zip' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_attorney_zip4' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_attorney_msa' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_attorney_county_name' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_attorney_phone' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_1_filing_number' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_1_filing_type_desc' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_1_filing_date' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_1_filing_time' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_1_filing_book' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_1_filing_page' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_1_agency' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_1_agency_state' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_1_agency_city' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_1_agency_county' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_2_filing_number' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_2_filing_type_desc' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_2_filing_date' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_2_filing_time' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_2_filing_book' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_2_filing_page' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_2_agency' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_2_agency_state' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_2_agency_city' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_2_agency_county' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_3_filing_number' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_3_filing_type_desc' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_3_filing_date' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_3_filing_time' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_3_filing_book' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_3_filing_page' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_3_agency' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_3_agency_state' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_3_agency_city' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_3_agency_county' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_4_filing_number' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_4_filing_type_desc' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_4_filing_date' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_4_filing_time' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_4_filing_book' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_4_filing_page' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_4_agency' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_4_agency_state' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_4_agency_city' => [
                'type' => Type::string(),
                'description' => ''
            ],
            'jnl_filing_4_agency_county' => [
                'type' => Type::string(),
                'description' => ''
            ],
        ];
    }
}
