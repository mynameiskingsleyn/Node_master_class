import {gql} from '@apollo/client/core';

import { SubjectEcho } from '../fragments/subject-echo.fragment';
import { SubjectInformation } from '../fragments/subject-information.fragment';
import { PublicReport } from '../fragments/public-record.fragment';
import { CreditReport } from '../fragments/credit-record.fragment';
import { PublicRecordNonFCRAReport } from '../fragments/nonfcra-report.fragment';

/**
 * Public Report Query
 */
export const CombinedReportQuery = gql`
query GetCombinedReport($id: ID!, $type: ReportTypesEnum) {
    getReport(id: $id, type: $type) {
      ...SubjectEcho
      ...SubjectInformation
      ...PublicReport
      ...PublicRecordNonFCRAReport
      ...CreditReport
      ReportDate
    }
  }
${SubjectEcho}
${SubjectInformation}
${PublicReport}
${PublicRecordNonFCRAReport}
${CreditReport}
`;
