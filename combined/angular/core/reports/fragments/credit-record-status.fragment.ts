import {gql} from '@apollo/client/core';

/**
 * Credit Report Fragment
 */
export const CreditReportStatus = gql`
fragment CreditReportStatus on InsiderReport {
    CreditReportData {
    ReportDate
    Disclaimer
    CreditReport {
        CreditBureau
      }
    }
}
`;
