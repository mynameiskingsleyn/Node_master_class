<?php

namespace App\Modules\Search\Type\ForeclosureRecord;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class ForeclosureRecordType extends GraphQLType
{
    protected $attributes = [
        'name' => 'ForeclosureRecord',
        'description' => 'ForeclosureRecord',
    ];

    public function fields(): array
    {
        return [
            'fo_ver_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'fo_state_filing_jurisdiction' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'fo_orig_case_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'fo_orig_filing_type' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'fo_orig_filing_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'fo_case_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'fo_filing_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'fo_filing_type_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'fo_filing_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'fo_party_names' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'fo_release_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'fo_case_amount' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'fo_eviction' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'fo_satisfied_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'fo_vacated_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'fo_agency' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'fo_agency_state' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'fo_case_county' => [
                'type' => Type::string(),
                'description' => '',
            ],

            // Non-FCRA Fields
            'pfc_geo_lat' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_geo_long' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_geo_blk' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_dms_lat' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_dms_long' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_county' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_msa' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_geo_match' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_geolink' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_vacancy_ind' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_vac_begdt' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_fc_unique_id' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_fc_ind' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_fc_addr_ind' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_owner_type' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_cp_data_datee' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_foreclosure_stage' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_deed_event_type_cd' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_deed_event_type_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_doc_type_cd' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_doc_type_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_cp_sale_amt' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_cp_dflt_amt' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_cp_dflt_dt' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_cp_auction_dt' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_lndr_cmpny_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_property_type_cd' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_property_type_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_ownr_1_first_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_ownr_1_last_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_ownr_1_cmpny_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_ownr_2_first_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_ownr_2_last_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_ownr_3_first_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_ownr_3_last_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_ownr_4_first_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_ownr_4_last_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_cp_filing_dt' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_cp_recording_dt' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_subdv_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_court_case_nbr' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_plntff1_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_plntff2_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_trustee_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_trustee_addr' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_trustee_city' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_trustee_state' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_trustee_zipcd' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_trustee_phone_nbr' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_orig_loan_dt' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_orig_loan_recording_dt' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_last_fullsale_trnsfr_dt' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_expand_legal_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_legal_desc_2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_legal_desc_3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_legal_desc_4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_PropertyAddress' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_PropertyCity' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_PropertyState' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_PropertyZip' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_FullProperty' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_parcel_number_parcel_id' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_parcel_number_unmatched_id' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_foreclosure_type_flag' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_deed_document_type_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_date_file_processed' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_deed_recording_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_foreclosure_type_age_flag' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_prim_range_pfc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_predir_pfc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_prim_name_pfc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_suffix_pfc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_postdir_pfc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_unit_desig_pfc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_sec_range_pfc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_p_city_name_pfc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_st_pfc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_zip_pfc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'pfc_zip4_pfc' => [
                'type' => Type::string(),
                'description' => '',
            ],
        ];
    }
}
