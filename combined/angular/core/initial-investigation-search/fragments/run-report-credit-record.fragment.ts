import {gql} from '@apollo/client/core';

/**
 * Credit Report Fragment
 */
export const RunReportCreditReport = gql`
fragment CreditReport on InsiderReportRunReport {
    CreditReportData {
    ReportDate
    ReportStatus
    ReportFormat
    }
}
`;
