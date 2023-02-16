<?php

namespace App\Modules\Search\Type\EmailAddressRecord;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class EmailAddressRecordType extends GraphQLType
{
    protected $attributes = [
        'name' => 'EmailAddressRecord',
        'description' => 'EmailAddressRecord',
    ];

    public function fields(): array
    {
        return [
            'email_ver_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'email_date_first_seen' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'email_email_address' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'email_orig_login_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'email_orig_site' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'email_fname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'email_mname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'email_lname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'email_address' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'email_city' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'email_state' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'email_zip' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'email_county' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'eml_LN_Date_Last_Seen' => [
                'type' => Type::string(),
                'description' => '',
            ],

            // Non-FCRA Fields
            'eml_fname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'eml_mname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'eml_lname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'eml_name_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'eml_company_title' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'eml_cln_company_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'eml_address' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'eml_city' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'eml_st' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'eml_zip' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'eml_orig_email' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'eml_clean_email' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'eml_best_fname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'eml_best_mname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'eml_best_lname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'eml_best_name_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'eml_best_address' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'eml_best_city' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'eml_best_st' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'eml_best_zip' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'eml_date_first_seen' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'eml_date_last_seen' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'eml_email_status' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'eml_email_status_reason' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'eml_additional_status_info' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'eml_relationship' => [
                'type' => Type::string(),
                'description' => '',
            ],
        ];
    }
}
