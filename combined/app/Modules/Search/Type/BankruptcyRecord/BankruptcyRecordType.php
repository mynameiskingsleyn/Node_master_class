<?php

namespace App\Modules\Search\Type\BankruptcyRecord;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class BankruptcyRecordType extends GraphQLType
{
    protected $attributes = [
        'name' => 'BankruptcyRecord',
        'description' => 'BankruptcyRecord',
    ];

    public function fields(): array
    {
        return [
            'bkt_ver_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_court_code' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_court_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_court_location' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_case_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_original_case_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_case_chapter' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_court_date_filed' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_orig_filing_type' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_filing_status' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_orig_chapter' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_orig_filing_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_orig_asset_indicator' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_is_corporation' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_disposed_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_case_disposition' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_record_type' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_filing_jurisdiction' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_case_assets' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_case_liabilities' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_case_type' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_converted_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_reopen_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_orig_closing_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_most_recent_date' => Fields\BankruptcyMostRecentDateField::class,

            // Non-FCRA Fields
            'bkt_case' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_prcode' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_fdate' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_sdate' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_debtor_chapter' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_debtor_converted_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_dcode' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_matchcode' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_fname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_mname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_lname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_socsecnum' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_address' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_ccity' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_sstate' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_zip' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_county' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_dphone' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_business' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_business1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_business2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_business3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_law_firm' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_attyname' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_attyaddr' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_attycity' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_attystate' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_attyzip' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_attyphone' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_attyemail' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_attyfax' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_trustid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_trustee' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_taddr' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_tcity' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_tstate' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_tzip' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_tphone' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_pet_seq' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_ddismissal' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_ecoa' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_funds' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_date341' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_time341' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_loc341' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_bardate' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_pocdate' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_cfiled' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_stfiled' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_court' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_district' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_caddr1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_caddr2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_mailcity' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_czip' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_cphone' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_reinstdate' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_case_closing_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'bkt_filingstatus' => [
                'type' => Type::string(),
                'description' => '',
            ],
        ];
    }
}
