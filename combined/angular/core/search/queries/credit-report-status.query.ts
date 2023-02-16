import {gql} from '@apollo/client/core';

import { CreditReportStatus } from '../../reports/fragments/credit-record-status.fragment';

/**
 * Public Report Query
 */
export const CreditReportStatusQuery = gql`
query GetReport($id: ID!, $type: ReportTypesEnum, $historyId: Float) {
    getReport(id: $id, type: $type, historyId: $historyId) {
      ...CreditReportStatus
      ReportDate
    }
}
${CreditReportStatus}
`;
