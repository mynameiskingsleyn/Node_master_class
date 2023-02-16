<?php

namespace App\Modules\Search\Type\PeopleAtWorkRecord;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class PeopleAtWorkRecordType extends GraphQLType
{
    protected $attributes = [
        'name' => 'PeopleAtWorkRecord',
        'description' => 'PeopleAtWorkRecord',
    ];

    public function fields(): array
    {
        return [
            'paw_ver_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'paw_dt_first_seen' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'paw_company_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'paw_company_address' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'paw_company_city' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'paw_company_state' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'paw_company_zip' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'paw_company_title' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'paw_company_status' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'paw_company_fein' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'paw_company_phone' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'paw_active_phone_flag' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'paw_fname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'paw_mname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'paw_lname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'paw_name_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'paw_phone' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'paw_email_address' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'paw_address' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'paw_state' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'paw_city' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'paw_zip' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'paw_county' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'paw_LN_Date_Last_Seen' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'paw_company_prim_range' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'paw_company_predir' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'paw_company_prim_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'paw_company_addr_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'paw_company_postdir' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'paw_company_unit_desig' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'paw_company_sec_range' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'paw_company_zip4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'paw_prim_range' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'paw_predir' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'paw_prim_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'paw_addr_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'paw_postdir' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'paw_unit_desig' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'paw_sec_range' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'paw_zip4' => [
                'type' => Type::string(),
                'description' => '',
            ],


            // Non-FCRA Fields
            'pawk_1_did' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_1_confidence_level' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_1_first' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_1_middle' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_1_last' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_1_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_1_ssn' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_1_title' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_1_first_seen' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_1_last_seen' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_1_bdid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_1_company_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_1_department' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_1_fein' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_1_address' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_1_city' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_1_state' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_1_zip5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_1_zip4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_1_phone10' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_1_verified' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_1_email' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_2_did' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_2_confidence_level' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_2_first' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_2_middle' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_2_last' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_2_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_2_ssn' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_2_title' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_2_first_seen' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_2_last_seen' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_2_bdid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_2_company_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_2_department' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_2_fein' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_2_address' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_2_city' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_2_state' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_2_zip5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_2_zip4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_2_phone10' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_2_verified' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_2_email' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_3_did' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_3_confidence_level' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_3_first' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_3_middle' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_3_last' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_3_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_3_ssn' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_3_title' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_3_first_seen' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_3_last_seen' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_3_bdid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_3_company_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_3_department' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_3_fein' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_3_address' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_3_city' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_3_state' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_3_zip5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_3_zip4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_3_phone10' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_3_verified' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_3_email' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_4_did' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_4_confidence_level' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_4_first' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_4_middle' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_4_last' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_4_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_4_ssn' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_4_title' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_4_first_seen' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_4_last_seen' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_4_bdid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_4_company_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_4_department' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_4_fein' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_4_address' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_4_city' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_4_state' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_4_zip5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_4_zip4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_4_phone10' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_4_verified' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_4_email' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_5_did' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_5_confidence_level' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_5_first' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_5_middle' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_5_last' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_5_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_5_ssn' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_5_title' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_5_first_seen' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_5_last_seen' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_5_bdid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_5_company_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_5_department' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_5_fein' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_5_address' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_5_city' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_5_state' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_5_zip5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_5_zip4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_5_phone10' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_5_verified' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pawk_5_email' => [
                'type' => Type::string(),
                'description' => '',
            ],
        ];
    }
}
