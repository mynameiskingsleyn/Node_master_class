import {gql} from '@apollo/client/core';
import { Address } from './address.fragment';
import { Date } from './date.fragment';
import { Party } from './party.fragment';
import { ThirdParty } from './third-party.fragment';
import { PhoneTimeZone } from './phone-timezone.fragment';
import { PublicReport } from '@app/core/reports/fragments/public-record.fragment';

/**
 * Public Record Fragment
 */
export const PublicReportExp = gql`
fragment PublicReportExp on InsiderReportExp {
    PublicRecordReport {
    ReportDate
    ReportStatus
    Notes
    FCRAInquiry
    TransactionID
      InputRecord {
        FirstName
        MiddleName
        LastName
        SuffixName
        SSN
        DOB
        Address
        City
        State
        Zip
        LexID
        include_credit_report
      }
      BankruptcyRecords {
        BankruptcyRecord {
          MostRecentDate
          CaseNumber
          CourtLocation
          CourtCode
          CaseType
          FilingDate {
            ...Date
          }
          OriginalFilingDate {
            ...Date
          }
          ClosedDate {
            ...Date
          }
          CourtName
          FilingType
          FilerType
          CorpFlag
          FilingStatus
          FilingJurisdiction
          Chapter
          OriginalChapter
          JudgeName
          Meeting {
            Date {
              Year
              Month
              Day
            }
            Time
            Address
          }
          JudgeIdentification
          DischargeDate {
            ...Date
          }
          Disposition
          SelfRepresented
          AssetsForUnsecured
          StatusHistory {
            Status {
              Type
              Date {
                ...Date
              }
            }
          }
          Comments {
            Comment {
              Description
              FilingDate {
                ...Date
              }
            }
          }
          Trustee {
            UniqueId
            Name {
              Full
              First
              Middle
              Last
              Prefix
            }
            Address {
              ...Address
            }
            Cart
            CrSortSz
            Lot
            LotOrder
            DBPC
            ChkDigit
            RecType
            Phone10
          }
          Attorneys {
            Attorney {
              BusinessId
              UniqueId
              SSN
              AppendedSSN
              TaxId
              Names {
                Name {
                  Full
                  First
                  Middle
                  Last
                  Suffix
                  Prefix
                  CompanyName
                  Type
                  UniqueId
                }
              }
              Addresses {
                Address {
                  StreetNumber
                  StreetPreDirection
                  StreetName
                  StreetSuffix
                  StreetPostDirection
                  UnitDesignation
                  UnitNumber
                  StreetAddress1
                  StreetAddress2
                  City
                  State
                  Zip5
                  Zip4
                  County
                  PostalCode
                  StateCityZip
                  Latitude
                  Longitude
                }
              }
            }
          }
          Debtors {
            Debtor {
              BusinessId
              UniqueId
              PersonFilterId
              DebtorType
              SSN
              AppendedSSN
              SSNMatch
              SSNMSrc
              TaxId
              AppendedTaxId
              DCodeDesc
              DispTypeDesc
              Chapter
              StatusDate {
                Year
                Month
                Day
              }
              DateVacated {
                Year
                Month
                Day
              }
              DateTransferred {
                Year
                Month
                Day
              }
              ConvertedDate {
                Year
                Month
                Day
              }
              DischargeDate {
                Year
                Month
                Day
              }
              Names {
                Name {
                  Full
                  First
                  Middle
                  Last
                  Suffix
                  Prefix
                  CompanyName
                  Type
                  UniqueId
                }
              }
              Addresses {
                Address {
                  StreetNumber
                  StreetPreDirection
                  StreetName
                  StreetSuffix
                  StreetPostDirection
                  UnitDesignation
                  UnitNumber
                  StreetAddress1
                  StreetAddress2
                  City
                  State
                  Zip5
                  Zip4
                  County
                  PostalCode
                  StateCityZip
                  Latitude
                  Longitude
                }
              }
              Phones {
                Phone {
                  ...PhoneTimeZone
                }
              }
              FilingType
              IsDisputed
              WithdrawnStatus {
                WithdrawnID
                WithdrawnDisposition
                WithdrawnDispositionDate {
                  Year
                  Month
                  Day
                }
              }
              StatementIdRecs {
                StatementIdRec {
                  StatementId
                }
              }
            }
          }
          IsDisputed
        }
      }
      JudgmentAndLienRecords {
        JudgmentAndLienRecord {
          BusinessIds {
            DotID
            EmpID
            POWID
            ProxID
            SeleID
            OrgID
            UltID
          }
          IdValue
          RMSId
          OriginFilingTime
          TaxCode
          Judge
          ExternalKey
          TMSId
          MatchedParty {
            PartyType
            UniqueId
            OriginName
            ParsedParty {
              Full
              First
              Middle
              Last
              Suffix
              Prefix
              CompanyName
            }
            Address {
              ...Address
            }
          }
          IRSSerialNumber
          OriginFilingNumber
          OriginFilingType
          OriginFilingDate {
            ...Date
          }
          CaseNumber
          Eviction
          Amount
          FilingJurisdiction
          FilingJurisdictionName
          FilingState
          FilingStatus
          CertificateNumber
          MultipleDefendant
          JudgeSatisfiedDate {
            ...Date
          }
          SuitDate {
            ...Date
          }
          JudgeVacatedDate {
            ...Date
          }
          ReleaseDate {
            Year
            Month
            Day
          }
          LegalLot
          LegalBlock
          Debtors {
            Debtor {
              HasCriminalConviction
              IsSexualOffender
              OriginName
              Addresses {
                Address {
                  ...Address
                }
              }
              Phones {
                Phone {
                  Phone10
                  Fax
                  TimeZone
                }
              }
              ParsedParties {
                Party {
                  ...Party
                }
              }
            }
          }
          ThirdParties {
            ThirdParty {
              ...ThirdParty
            }
          }
          Creditors {
            Creditor {
              HasCriminalConviction
              IsSexualOffender
              Name
              Address {
                ...Address
              }
              Addresses {
                Address {
                  ...Address
                }
              }
              Phones {
                Phone {
                  Phone10
                  Fax
                  TimeZone
                }
              }
              ParsedParties {
                Party {
                  ...Party
                }
              }
            }
          }
          DebtorAttorneys {
            Attorney {
              HasCriminalConviction
              IsSexualOffender
              Name
              Address {
                ...Address
              }
              Phone
              TimeZone
              Addresses {
                Address {
                  ...Address
                }
              }
              Phones {
                Phone {
                  ...PhoneTimeZone
                }
              }
              ParsedParties {
                Party {
                  ...Party
                }
              }
            }
          }
          Filings {
            Filing {
              Number
              Type
              Date {
                ...Date
              }
              OriginFilingDate {
                ...Date
              }
              Book
              Page
              Agency
              AgencyCity
              AgencyState
              AgencyCounty
              FilingStatus
              FilingDescription
              FilingTime
              IsDisputed
              StatementIdRecs {
                StatementIdRec {
                  StatementId
                }
              }
            }
          }
          IsDisputed
          StatementIdRecs {
            StatementIdRec {
              StatementId
            }
          }
          PersistentRecordId
        }
      }
      ForeclosureRecords {
        ForeclosureRecord {
          fo_ver_date
          fo_state_filing_jurisdiction
          fo_orig_case_number
          fo_orig_filing_type
          fo_orig_filing_date
          fo_case_number
          fo_filing_number
          fo_filing_type_desc
          fo_filing_date
          fo_party_names
          fo_release_date
          fo_case_amount
          fo_eviction
          fo_satisfied_date
          fo_vacated_date
          fo_agency
          fo_agency_state
          fo_case_county
        }
      }
      CriminalRecords {
        CriminalRecord {
          crim_ver_date
          crim_source_state
          crim_case_1
          crim_offense_date_1
          crim_arrest_date_1
          crim_num_of_counts_1
          crim_offense_code_1
          crim_charge_1
          crim_offense_desc_1_1
          crim_offense_desc_2_1
          crim_add_offense_code_1
          crim_add_offense_desc_1
          crim_offense_type_1
          crim_offense_level_1
          crim_court_1
          crim_sentence_date_1
          crim_sentence_desc_1_1
          crim_sentence_desc_2_1
          crim_sentence_desc_3_1
          crim_sentence_desc_4_1
          crim_sentence_jail_time_1
          crim_case_2
          crim_offense_date_2
          crim_arrest_date_2
          crim_num_of_counts_2
          crim_offense_code_2
          crim_charge_2
          crim_offense_desc_1_2
          crim_offense_desc_2_2
          crim_add_offense_code_2
          crim_add_offense_desc_2
          crim_offense_type_2
          crim_offense_level_2
          crim_court_2
          crim_sentence_date_2
          crim_sentence_desc_1_2
          crim_sentence_desc_2_2
          crim_sentence_desc_3_2
          crim_sentence_desc_4_2
          crim_sentence_jail_time_2
          crim_case_3
          crim_offense_date_3
          crim_arrest_date_3
          crim_num_of_counts_3
          crim_offense_code_3
          crim_charge_3
          crim_offense_desc_1_3
          crim_offense_desc_2_3
          crim_add_offense_code_3
          crim_add_offense_desc_3
          crim_offense_type_3
          crim_offense_level_3
          crim_court_3
          crim_sentence_date_3
          crim_sentence_desc_1_3
          crim_sentence_desc_2_3
          crim_sentence_desc_3_3
          crim_sentence_desc_4_3
          crim_sentence_jail_time_3
          crim_data_type
          crim_sentence_status_1
          crim_admin_date_1
          crim_event_date_1
          crim_current_inmate_status_1
          crim_latest_admin_date_1
          crim_scheduled_release_date_1
          crim_actual_release_date_1
          crim_control_release_date_1
          crim_parole_sentence_date_1
          crim_parole_event_date_1
          crim_parole_release_date_1
          crim_parole_current_status_1
          crim_parole_current_status_desc_1
          crim_parole_scheduled_end_date_1
          crim_parole_actual_end_date_1
          crim_parole_location_1
          crim_sentence_status_2
          crim_adimin_date_2
          crim_event_date_2
          crim_current_inmate_status_2
          crim_latest_admin_date_2
          crim_scheduled_release_date_2
          crim_actual_release_date_2
          crim_control_release_date_2
          crim_parole_sentence_date_2
          crim_parole_event_date_2
          crim_parole_release_date_2
          crim_parole_current_status_2
          crim_parole_current_status_desc_2
          crim_parole_scheduled_end_date_2
          crim_parole_actual_end_date_2
          crim_parole_location_2
          crim_sentence_status_3
          crim_adimin_date_3
          crim_event_date_3
          crim_current_inmate_status_3
          crim_latest_admin_date_3
          crim_scheduled_release_date_3
          crim_actual_release_date_3
          crim_control_release_date_3
          crim_parole_sentence_date_3
          crim_parole_event_date_3
          crim_parole_release_date_3
          crim_parole_current_status_3
          crim_parole_current_status_desc_3
          crim_parole_scheduled_end_date_3
          crim_parole_actual_end_date_3
          crim_parole_location_3
        }
      }

      SexOffenderRecords {
        SexOffenderRecord {
          sof_ver_date
          sof_last_name
          sof_first_name
          sof_middle_name
          sof_suffix_name
          sof_address_last_seen
          sof_dob
          sof_offender_id
          sof_orig_state
          sof_docket_number
          sof_offense_1
          sof_conviction_place_1
          sof_conviction_date_1
          sof_victim_minor_1
          sof_conviction_jurisdiction_1
          sof_case_number_1
          sof_offense_date_1
          sof_offense_2
          sof_conviction_place_2
          sof_conviction_date_2
          sof_victim_minor_2
          sof_conviction_jurisdiction_2
          sof_case_number_2
          sof_offense_date_2
          sof_offense_3
          sof_conviction_place_3
          sof_conviction_date_3
          sof_victim_minor_3
          sof_conviction_jurisdiction_3
          sof_case_number_3
          sof_offense_date_3
          sof_registration_address
          sof_registration_city
          sof_registration_state
          sof_registration_zip
          sof_registration_county
        }
      }

      PropertyRecords {
        PropertyRecord {
          prop_ver_date
          property_st
          property_address1
          property_zip
          property_address2
          property_zip4
          property_v_city_name
          property_geo_lat
          property_p_city_name
          property_geo_long
          property_county_name
          property_msa
          deed_state
          deed_sales_price
          deed_county_name
          deed_sales_price_desc
          deed_apnt_or_pin_number
          deed_property_use_desc
          deed_fips_code
          deed_assessment_match_land_use_desc
          deed_record_type
          deed_record_type_desc
          deed_condo_desc
          deed_multi_apn_flag
          deed_timeshare_flag
          deed_buyer_addendum_flag
          deed_first_td_loan_amount
          deed_seller_addendum_flag
          deed_first_td_loan_type_desc
          deed_lender_name_id
          deed_lender_name
          deed_first_td_interest_rate
          deed_lender_dba_aka_name
          deed_first_td_due_date
          deed_tax_id_number
          deed_first_td_lender_type_desc
          deed_lender_full_street_address
          deed_second_home_rider
          deed_lender_address_unit_number
          deed_second_td_loan_amount
          deed_lender_address_citystatezip
          deed_second_td_lender_type_desc
          deed_legal_brief_description
          deed_partial_interest_transferred
          deed_contract_date
          deed_loan_term_months
          deed_recording_date
          deed_loan_term_years
          deed_document_type_code
          deed_transaction_type_desc
          deed_arm_reset_date
          deed_mortgage_deed_type_desc
          deed_mortgage_term_code_desc
          deed_document_number
          deed_mortgage_term
          deed_land_lot_size
          deed_lender_address
          deed_legal_lot_desc
          deed_mortgage_date
          deed_legal_lot_number
          deed_building_square_feet
          deed_legal_city_municipality_township
          deed_foreclosure_desc
          deed_loan_number
          deed_refi_flag_desc
          deed_hawaii_condo_name
          deed_equity_flag_desc
          deed_document_type_desc
          deed_assessment_match_land_use_desc
          deed_type_financing
          deed_type_financing_desc
          assess_state_code
          assess_mortgage_lender_type_desc
          assess_mortgage_loan_type_desc
          assess_county_name
          assess_assessed_total_value
          assess_apna_or_pin_number
          assess_assessed_value_year
          assess_fips_code
          assess_market_land_value
          assess_duplicate_apn_multiple_address_id
          assess_market_improvement_value
          assess_tape_cut_date
          assess_market_total_value
          assess_edition_number
          assess_market_value_year
          assess_assessee_ownership_rights_desc
          assess_assessed_land_value
          assess_assessee_relationship_desc
          assess_tax_exemption1_desc
          assess_assessee_phone_number
          assess_tax_exemption2_desc
          assess_contract_owner
          assess_tax_exemption3_desc
          assess_assessee_name_type_desc
          assess_tax_exemption4_desc
          assess_second_assessee_name_type_desc
          assess_tax_delinquent_year
          assess_mail_care_of_name_type_desc
          assess_land_square_footage
          assess_mailing_care_of_name
          assess_year_built
          assess_recording_date
          assess_no_of_stories
          assess_prior_recording_date
          assess_no_of_stories_desc
          assess_county_land_use_description
          assess_no_of_bedrooms
          assess_standardized_land_use_desc
          assess_no_of_baths
          assess_legal_lot_number
          assess_land_acres
          assess_legal_subdivision_name
          assess_land_dimensions
          assess_legal_brief_description
          assess_effective_year_built
          assess_record_type_desc
          assess_no_of_buildings
          assess_legal_city_municipality_township
          assess_no_of_units
          assess_census_tract
          assess_no_of_rooms
          assess_timeshare_code
          assess_building_class_desc
          assess_zoning
          assess_condo_project_name
          assess_transfer_date
          assess_building_name
          assess_document_type
          assess_document_type_desc
          assess_comments
          assess_prior_transfer_date
          assess_neighborhood_code
          assess_sale_date
          assess_calculated_land_value
          assess_sales_price
          assess_calculated_improvement_value
          assess_sales_price_desc
          assess_calculated_total_value
          assess_prior_sales_price
          assess_adjusted_gross_square_feet
          assess_prior_sales_price_desc
          assess_no_of_full_baths
          assess_mortgage_loan_amount
          assess_no_of_half_baths
          assess_mortgage_lender_name
          assess_condition_desc
          buyer_address1
          buyer_st
          buyer_address2
          buyer_zip
          buyer_p_city_name
          buyer_phone_number
          buyer_v_city_name
          buyer_vesting_desc
          buyer_1_id_desc
          buyer_1_name_suffix
          buyer_1_title
          buyer_1_company_name
          buyer_1_orig_name
          buyer_1_first_name
          buyer_1_middle_name
          buyer_1_last_name
          buyer_2_id_desc
          buyer_2_name_suffix
          buyer_2_title
          buyer_2_company_name
          buyer_2_orig_name
          buyer_2_first_name
          buyer_2_middle_name
          buyer_2_last_name
          seller_address1
          seller_st
          seller_address2
          seller_zip
          seller_p_city_name
          seller_phone_number
          seller_v_city_name
          seller_1_id_desc
          seller_1_name_suffix
          seller_1_title
          seller_1_company_name
          seller_1_orig_name
          seller_1_first_name
          seller_1_middle_name
          seller_1_last_name
          seller_2_id_desc
          seller_2_name_suffix
          seller_2_title
          seller_2_company_name
          seller_2_orig_name
          seller_2_first_name
          seller_2_middle_name
          seller_2_last_name
          borrower_address1
          borrower_st
          borrower_address2
          borrower_zip
          borrower_p_city_name
          borrower_phone_number
          borrower_v_city_name
          borrower_vesting_desc
          borrower_1_id_desc
          borrower_1_name_suffix
          borrower_1_title
          borrower_1_company_name
          borrower_1_orig_name
          borrower_1_first_name
          borrower_1_middle_name
          borrower_1_last_name
          borrower_2_id_desc
          borrower_2_name_suffix
          borrower_2_title
          borrower_2_company_name
          borrower_2_orig_name
          borrower_2_first_name
          borrower_2_middle_name
          borrower_2_last_name
          owner_address1
          owner_st
          owner_address2
          owner_zip
          owner_p_city_name
          owner_phone_number
          owner_v_city_name
          owner_1_title
          owner_1_name_suffix
          owner_1_orig_name
          owner_1_company_name
          owner_1_first_name
          owner_1_middle_name
          owner_1_last_name
          owner_2_title
          owner_2_name_suffix
          owner_2_orig_name
          owner_2_company_name
          owner_2_first_name
          owner_2_middle_name
          owner_2_last_name
          assessee_address1
          assessee_st
          assessee_address2
          assessee_zip
          assessee_p_city_name
          assessee_phone_number
          assessee_v_city_name
          assessee_1_title
          assessee_1_name_suffix
          assessee_1_orig_name
          assessee_1_company_name
          assessee_1_first_name
          assessee_1_middle_name
          assessee_1_last_name
          assessee_2_title
          assessee_2_name_suffix
          assessee_2_orig_name
          assessee_2_company_name
          assessee_2_first_name
          assessee_2_middle_name
          assessee_2_last_name
          prop_LN_Date_Last_Seen
        }
      }

      ProfessionalLicenseRecords {
        ProfessionalLicenseRecord {
          pro_ver_date
          pro_profession_or_board
          pro_license_status
          pro_issue_date
          pro_last_renewal_date
          pro_source_st
          pro_education_1_school_attended
          pro_education_1_degree
          pro_education_1_dates_attended
          pro_date_first_seen
          pro_LN_Date_Last_Seen
          pro_license_type
          pro_license_number
          phone
          pro_expiration_date
          pro_board_action_indicator
          pro_vendor
          pro_status_effective_dt
        }
      }
      WatercraftRecords {
        WatercraftRecord {
          boat_ver_date
          boat_state_origin
          boat_watercraft_id
          boat_watercraft_name
          boat_hull_number
          boat_watercraft_class_code
          boat_watercraft_class_description
          boat_title_state
          boat_title_status_description
          boat_title_status_code
          boat_title_type_description
          boat_title_type_code
          boat_title_issue_date
          boat_state_purchased
          boat_purchase_date
          boat_st_registration
          boat_county_registration
          boat_registration_status_date
          boat_registration_status_code
          boat_registration_status_description
          boat_vehicle_type_code
          boat_vehicle_type_description
          boat_registration_number
          boat_lien_name_1
          boat_lien_address_1_1
          boat_lien_address_2_1
          boat_lien_city_1
          boat_lien_state_1
          boat_lien_zip_1
          boat_lien_date_1
          boat_lien_indicator_1
          boat_lien_name_2
          boat_lien_address_1_2
          boat_lien_address_2_2
          boat_lien_city_2
          boat_lien_state_2
          boat_lien_zip_2
          boat_lien_date_2
          boat_lien_indicator_2
          boat_watercraft_make_description
          boat_watercraft_model_description
          boat_model_year
          boat_use_code
          boat_use_description
          boat_propulsion_code
          boat_propulsion_description
          boat_watercraft_length
          boat_watercraft_number_of_engines
          boat_purchase_price
          boat_dealer
          boat_new_used_flag
          boat_registration_date
          boat_registration_expiration_date
          boat_coast_guard_documented_flag
          boat_coast_guard_number
        }
      }
      EmailAddressRecords {
        EmailAddressRecord {
          email_ver_date
          email_date_first_seen
          email_email_address
          email_orig_login_date
          email_orig_site
          email_fname
          email_mname
          email_lname
          eml_LN_Date_Last_Seen
        }
      }
      PhoneRecords {
        PhoneRecord {
          pho_ver_date
          pho_name_first
          pho_name_middle
          pho_name_last
          pho_name_suffix
          pho_listing_type_res
          pho_listing_type_bus
          pho_listing_type_gov
          pho_dt_first_seen
          pho_address
          pho_city
          pho_state
          pho_phone
          pho_zip
          pho_publish_code
          pho_disc_cnt12
          pho_LN_Date_Last_Seen
        }
      }
      PeopleAtWorkRecords {
        PeopleAtWorkRecord {
          paw_ver_date
          paw_dt_first_seen
          paw_LN_Date_Last_Seen
          paw_company_name
          paw_company_address
          paw_company_prim_range
          paw_company_predir
          paw_company_prim_name
          paw_company_addr_suffix
          paw_company_postdir
          paw_company_unit_desig
          paw_company_sec_range
          paw_company_city
          paw_company_state
          paw_company_zip
          paw_company_zip4
          paw_company_title
          paw_company_status
          paw_company_fein
          paw_company_phone
          paw_active_phone_flag
          paw_prim_range
          paw_predir
          paw_prim_name
          paw_addr_suffix
          paw_postdir
          paw_unit_desig
          paw_sec_range
          paw_city
          paw_state
          paw_zip
          paw_zip4
          paw_address
          paw_LN_Date_Last_Seen
        }
      }

      AlertList {
        alert_security_freeze
        alert_security_fraud
        alert_identity_theft
        alert_legal_flag
        alert_cnsmr_statement
        alert_data_under_dispute
      }
  }
}
${ Address}
${ Date }
${ Party }
${ ThirdParty }
${ PhoneTimeZone }
`;
