import {gql} from '@apollo/client/core';

import { SubjectEcho } from '../fragments/subject-echo.fragment';
import { SubjectInformation } from '../fragments/subject-information.fragment';
import { PublicRecordNonFCRAReport } from '../fragments/nonfcra-report.fragment';

/**
 * Public Report Query
 */
export const PublicRecordNonFCRAReportQuery = gql`
query GetNonFCRAReport($id: ID!, $type: ReportTypesEnum, $historyId: Float) {
    getReport(id: $id, type: $type, historyId: $historyId) {
      ...SubjectEcho
      ...SubjectInformation
      ...PublicRecordNonFCRAReport
      ReportDate
    }
  }
${SubjectEcho}
${SubjectInformation}
${PublicRecordNonFCRAReport}
`;
