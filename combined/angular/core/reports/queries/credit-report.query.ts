import {gql} from '@apollo/client/core';

import { SubjectEcho } from '../fragments/subject-echo.fragment';
import { SubjectInformation } from '../fragments/subject-information.fragment';
import { CreditReport } from '../fragments/credit-record.fragment';

/**
 * Public Report Query
 */
export const CreditReportQuery = gql`
query GetCreditReport($id: ID!, $type: ReportTypesEnum, $historyId: Float) {
    getReport(id: $id, type: $type, historyId: $historyId) {
      ...SubjectEcho
      ...SubjectInformation
      ...CreditReport
      ReportDate
    }
  }
${SubjectEcho}
${SubjectInformation}
${CreditReport}
`;
