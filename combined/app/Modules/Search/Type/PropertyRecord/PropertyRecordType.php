<?php

namespace App\Modules\Search\Type\PropertyRecord;

use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL\Type\Definition\Type;

class PropertyRecordType extends GraphQLType
{
    protected $attributes = [
        'name' => 'PropertyRecord',
        'description' => 'PropertyRecord',
    ];

    public function fields(): array
    {
        return [
            'prop_ver_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_state' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_county_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_apnt_or_pin_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_fips_code' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_record_type' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_record_type_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_multi_apn_flag' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_buyer_addendum_flag' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_seller_addendum_flag' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_lender_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_lender_name_id' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_lender_dba_aka_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_tax_id_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_lender_full_street_address' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_lender_address_unit_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_lender_address_citystatezip' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_legal_brief_description' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_contract_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_recording_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_document_type_code' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_document_type_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_arm_reset_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_document_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_land_lot_size' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_legal_lot_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_legal_lot_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_legal_city_municipality_township' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_loan_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_hawaii_condo_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_sales_price' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_sales_price_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_property_use_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_assessment_match_land_use_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_condo_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_timeshare_flag' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_first_td_loan_amount' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_first_td_loan_type_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_type_financing' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_type_financing_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_first_td_interest_rate' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_first_td_due_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_second_home_rider' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_second_td_loan_amount' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_first_td_lender_type_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_second_td_lender_type_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_partial_interest_transferred' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_loan_term_months' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_loan_term_years' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_transaction_type_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_mortgage_deed_type_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_mortgage_term_code_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_mortgage_term' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_lender_address' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_mortgage_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_building_square_feet' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_foreclosure_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_refi_flag_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_equity_flag_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_state_code' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_county_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_apna_or_pin_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_fips_code' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_duplicate_apn_multiple_address_id' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_tape_cut_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_edition_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_assessee_ownership_rights_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_assessee_relationship_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_assessee_phone_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_contract_owner' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_assessee_name_type_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_second_assessee_name_type_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_mail_care_of_name_type_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_mailing_care_of_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_recording_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_prior_recording_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_county_land_use_description' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_standardized_land_use_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_legal_lot_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_legal_subdivision_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_legal_brief_description' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_record_type_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_legal_city_municipality_township' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_census_tract' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_timeshare_code' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_zoning' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_transfer_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_document_type' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_document_type_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_prior_transfer_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_sale_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_sales_price' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_sales_price_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_prior_sales_price' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_prior_sales_price_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_mortgage_loan_amount' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_mortgage_loan_type_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_mortgage_lender_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_mortgage_lender_type_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_assessed_total_value' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_assessed_value_year' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_market_land_value' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_market_improvement_value' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_market_total_value' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_market_value_year' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_assessed_land_value' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_tax_exemption1_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_tax_exemption2_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_tax_exemption3_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_tax_exemption4_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_tax_delinquent_year' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_land_square_footage' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_year_built' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_no_of_stories' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_no_of_stories_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_no_of_bedrooms' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_no_of_baths' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_land_acres' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_land_dimensions' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_effective_year_built' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_no_of_buildings' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_no_of_units' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_no_of_rooms' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_building_class_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_condo_project_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_building_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_comments' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_neighborhood_code' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_calculated_land_value' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_calculated_improvement_value' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_calculated_total_value' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_adjusted_gross_square_feet' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_no_of_full_baths' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_no_of_half_baths' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_condition_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'property_address1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'property_address2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'property_p_city_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'property_v_city_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'property_st' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'property_zip' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'property_zip4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'property_county_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'property_geo_lat' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'property_geo_long' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'property_msa' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'buyer_address1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'buyer_address2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'buyer_p_city_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'buyer_v_city_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'buyer_st' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'buyer_zip' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'buyer_phone_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'buyer_vesting_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'buyer_1_orig_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'buyer_1_id_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'buyer_1_title' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'buyer_1_first_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'buyer_1_middle_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'buyer_1_last_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'buyer_1_name_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'buyer_1_company_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'buyer_2_orig_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'buyer_2_id_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'buyer_2_title' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'buyer_2_first_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'buyer_2_middle_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'buyer_2_last_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'buyer_2_name_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'buyer_2_company_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'seller_address1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'seller_address2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'seller_p_city_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'seller_v_city_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'seller_st' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'seller_zip' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'seller_phone_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'seller_1_orig_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'seller_1_id_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'seller_1_title' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'seller_1_first_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'seller_1_middle_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'seller_1_last_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'seller_1_name_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'seller_1_company_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'seller_2_orig_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'seller_2_id_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'seller_2_title' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'seller_2_first_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'seller_2_middle_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'seller_2_last_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'seller_2_name_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'seller_2_company_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'owner_address1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'owner_address2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'owner_p_city_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'owner_v_city_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'owner_st' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'owner_zip' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'owner_phone_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'owner_1_orig_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'owner_1_title' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'owner_1_first_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'owner_1_middle_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'owner_1_last_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'owner_1_name_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'owner_1_company_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'owner_2_orig_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'owner_2_title' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'owner_2_first_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'owner_2_middle_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'owner_2_last_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'owner_2_name_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'owner_2_company_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assessee_address1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assessee_address2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assessee_p_city_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assessee_v_city_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assessee_st' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assessee_zip' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assessee_phone_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assessee_1_orig_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assessee_1_title' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assessee_1_first_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assessee_1_middle_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assessee_1_last_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assessee_1_name_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assessee_1_company_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assessee_2_orig_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assessee_2_title' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assessee_2_first_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assessee_2_middle_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assessee_2_last_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assessee_2_name_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assessee_2_company_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'borrower_address1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'borrower_address2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'borrower_p_city_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'borrower_v_city_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'borrower_st' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'borrower_zip' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'borrower_phone_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'borrower_vesting_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'borrower_1_orig_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'borrower_1_id_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'borrower_1_title' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'borrower_1_first_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'borrower_1_middle_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'borrower_1_last_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'borrower_1_name_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'borrower_1_company_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'borrower_2_orig_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'borrower_2_id_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'borrower_2_title' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'borrower_2_first_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'borrower_2_middle_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'borrower_2_last_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'borrower_2_name_suffix' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'borrower_2_company_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'prop_LN_Date_Last_Seen' => [
                'type' => Type::string(),
                'description' => '',
            ],

            // Non-FCRA Fields
            'deed_phone_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_property_address_code' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_property_address_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_recorder_book_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_recorder_page_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_legal_block' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_legal_section' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_legal_district' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_legal_land_lot' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_legal_unit' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_legal_subdivision_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_legal_phase_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_legal_tract_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_legal_sec_twn_rng_mer' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_recorder_map_reference' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_complete_legal_description_code' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_concurrent_mortgage_book_page_document_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_hawaii_tct' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_hawaii_condo_cpr_code' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_filler_except_hawaii' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_city_transfer_tax' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_county_transfer_tax' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_total_transfer_tax' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_excise_tax_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_title_company_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_rate_change_frequency' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_rate_change_frequency_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_change_index' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_adjustable_rate_index' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_adjustable_rate_index_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_adjustable_rate_rider' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_graduated_payment_rider' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_balloon_rider' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_fixed_step_rate_rider' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_fixed_step_rate_rider_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_condominium_rider' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_planned_unit_development_rider' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_rate_improvement_rider' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_assumability_rider' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_prepayment_rider' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_one_four_family_rider' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_biweekly_payment_rider' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'deed_iris_apn' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_certification_date' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_tax_account_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_property_address_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_owner_occupied' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_recorder_book_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_recorder_page_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_legal_lot_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_legal_land_lot' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_legal_block' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_legal_section' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_legal_district' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_legal_unit' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_legal_phase_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_legal_tract_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_legal_sec_twn_rng_mer' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_legal_assessor_map_ref' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_ownership_type_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_new_record_type_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_recorder_document_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_homestead_homeowner_exemption' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_assessed_improvement_value' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_tax_year' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_tax_amount' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_tax_rate_code_area' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_school_tax_district1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_school_tax_district2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_school_tax_district3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_no_of_partial_baths' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_garage_type_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_pool_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_exterior_walls_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_roof_type_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_heating_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_heating_fuel_type_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_air_conditioning_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_air_conditioning_type_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_building_area' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_building_area1' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_building_area2' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_building_area3' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_building_area4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_building_area5' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_building_area6' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_building_area7' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_building_area_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_building_area1_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_building_area2_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_building_area3_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_building_area4_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_building_area5_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_building_area6_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_building_area7_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_parking_no_of_cars' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_style_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_type_construction_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_foundation_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_roof_cover_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_elevator' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_fireplace_indicator_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_fireplace_number' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_basement_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_site_influence1_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_site_influence2_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_site_influence3_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_site_influence4_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_site_influence5_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_amenities1_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_amenities2_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_amenities3_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_amenities4_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_amenities5_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_other_buildings1_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_other_buildings2_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_other_buildings3_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_other_buildings4_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_other_buildings5_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_living_square_feet' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_iris_apn' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_addl_legal' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_pool_indicator' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_frame_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_electric_energy_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_sewer_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assess_water_desc' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'property_orig_address' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'property_orig_unit' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'property_orig_csz' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'buyer_zip4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'buyer_county_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'buyer_geo_lat' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'buyer_geo_long' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'buyer_msa' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'buyer_orig_address' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'buyer_orig_unit' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'buyer_orig_csz' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'buyer_1_did' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'buyer_1_bdid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'buyer_1_ssn' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'buyer_2_did' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'buyer_2_bdid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'buyer_2_ssn' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'seller_zip4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'seller_county_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'seller_geo_lat' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'seller_geo_long' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'seller_msa' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'seller_orig_address' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'seller_orig_unit' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'seller_orig_csz' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'seller_1_did' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'seller_1_bdid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'seller_1_ssn' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'seller_2_did' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'seller_2_bdid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'seller_2_ssn' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'owner_zip4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'owner_county_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'owner_geo_lat' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'owner_geo_long' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'owner_msa' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'owner_orig_address' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'owner_orig_unit' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'owner_orig_csz' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'owner_1_did' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'owner_1_bdid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'owner_1_ssn' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'owner_2_did' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'owner_2_bdid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'owner_2_ssn' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assessee_zip4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assessee_county_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assessee_geo_lat' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assessee_geo_long' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assessee_msa' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assessee_orig_address' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assessee_orig_unit' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assessee_orig_csz' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assessee_1_did' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assessee_1_bdid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assessee_1_ssn' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assessee_2_did' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assessee_2_bdid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'assessee_2_ssn' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'borrower_zip4' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'borrower_county_name' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'borrower_geo_lat' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'borrower_geo_long' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'borrower_msa' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'borrower_orig_address' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'borrower_orig_unit' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'borrower_orig_csz' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'borrower_1_did' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'borrower_1_bdid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'borrower_1_ssn' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'borrower_2_did' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'borrower_2_bdid' => [
                'type' => Type::string(),
                'description' => '',
            ],
            'borrower_2_ssn' => [
                'type' => Type::string(),
                'description' => '',
            ],
        ];
    }
}
