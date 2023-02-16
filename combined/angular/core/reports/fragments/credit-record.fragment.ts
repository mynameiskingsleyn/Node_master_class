import {gql} from '@apollo/client/core';

/**
 * Credit Report Fragment
 */
export const CreditReport = gql`
fragment CreditReport on InsiderReport {
    CreditReportData {
    ReportDate
    ReportStatus
    Disclaimer
    CreditReport {
        ReportDate
        ReportStatus
        Notes
        PoID
        CaseNumber
        CreditCode
        NoHitFlag
        ReportsCombined
        NumberInquiries
        CreditBureau
        CreditPercentUtilization
        TotalPaymentAmount
        TotalBalance
        TotalAmountPastDue
        TradesInstallment
        TradesRevolving
        TradesMortgage
        TradesOther
        TimeReportProcessed
        DateReportProcessed
        DateofFirstTradeline
        DateofLastTradelineActivity
        SubjectInformation {
            Name
            SSN
            FirstName
            LastName
            MiddleName
            BirthDate
        }
        BorrowerSubject {
            UnparsedName
            SSN
            FirstName
            LastName
            MiddleName
            NameSuffix
            BirthDate
            Residence {
                Location
                City
                PostalCode
                State
                StreetAddress
            }
        }
        Keys {
            TRANSACTION_ID
            SON
            SOI
            ITEM_NUMBER
            CASE_SERVICE
            CASETYPE
            CASECATEGORY
            CASENUMBER
            B01
            B02
            B03
            B04
            B05
            B06
            B07
            B08
            B09
            B10
            B11
            B12
            B13
            B14
            B15
            B16
            B17
            B27
            HIGHEST_RATING_ON_ANY_TRADE
            NUMBER_OF_TRADES_WITH_HIGHEST_RATING
            PUBLIC_RECORD_INFORMATION_PROVIDERS
            VERIFICATION_ERR
            TMS_SCORE
            TRADELINE_TOTAL_TRADELINES_USED
            TRADELINE_TOTAL_CREDIT_LIMIT
            TRADELINE_TOTAL_BALANCE
            TRADELINE_TOTAL_HIGH_CREDIT
            TRADELINE_TOTAL_PAST_DUE
            DEROGATORY_TRADELINE_TOTAL_TRADELINES_USED
            DEROGATORY_TRADELINE_TOTAL_CREDIT_LIMIT
            DEROGATORY_TRADELINE_TOTAL_BALANCE
            DEROGATORY_TRADELINE_TOTAL_HIGH_CREDIT
            DEROGATORY_TRADELINE_TOTAL_PAST_DUE
        }
        Trades {
            CreditRepository
            SourceBureaus
            SubscriberCode
            BorrowerID
            CreditBusinessType
            CreditFileID
            CreditLiabilityID
            CreditLoanType
            CreditTradeReferenceID
            AccountBalanceDate
            AccountIdentifier
            AccountOpenedDate
            AccountOwnershipType
            AccountReportedDate
            AccountStatusDate
            AccountStatusType
            AccountType
            CreditLimitAmount
            DerogatoryDataIndicator
            HighCreditAmount
            LastActivityDate
            MonthlyPaymentAmount
            MonthsReviewedCount
            PastDueAmount
            TermsDescription
            TermsSourceType
            UnpaidBalanceAmount
            CREDITOR {
                Name
                City
                PostalCode
                State
                StreetAddress
              }
              LATE_COUNT {
                Days30
                Days60
                Days90
              }
              PAYMENT_PATTERN {
                Data
                StartDate
              }
              CURRENT_RATING {
                Code
                Type
              }
              CONTACT_POINT {
                Phones
              }
              CREDIT_COMMENT
        }
        Collections {
          CREDITOR {
                Name
                City
                PostalCode
                State
                StreetAddress
          }
          SubscriberCode
          CreditBusinessType
          AccountReportedDate
          AccountStatusType
          HighCreditAmount
          UnpaidBalanceAmount
          CREDIT_COMMENT
        }
        CreditFile {
            FileID
            SourceType
            Borrower {
              FirstName
              LastName
              UnparsedName
              SSN
              BirthDate
              Aliases {
                FirstName
                LastName
                MiddleName
              }
              Residence {
                BorrowerResidencyType
                City
                PostalCode
                State
                StreetAddress
              }
              Employer {
                EmploymentCurrentIndicator
                EmploymentReportedDate
                Name
                City
                State
              }
            }
            UnparsedAddresses
            UnparsedEmployment
        }
        PublicRecords {
            BorrowerID
            CaseNumber
            CreditFileID
            CreditPublicRecordID
            CreditTradeReferenceID
            AccountOwnershipType
            CourtName
            DispositionType
            FiledDate
            LegalObligationAmount
            Address
            PaidDate
            PlaintiffName
            Type
            CreditorClass
            BankruptcyAssetsAmount
            BankruptcyLiabilitiesAmount
            SourceType
            AccountPaidDate
            AccountOpenedDate
            LastActivityDate
            Chapter13Bankruptcy
        }
        Inquiries {
          TradeRefID
          SubscriberCode
          Name
          Date
          BusinessType
          SourceType
        }
        CreditCode
        }
    }
}
`;
