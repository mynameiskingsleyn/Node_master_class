import {gql} from '@apollo/client/core';

import { SubjectEcho } from '../fragments/subject-echo.fragment';
import { SubjectInformation } from '../fragments/subject-information.fragment';
import { PublicReport } from '../fragments/public-record.fragment';
import { CreditReport } from '../fragments/credit-record.fragment';
import { PublicRecordNonFCRAReport } from '../fragments/nonfcra-report.fragment';

/**
 * Public Report Query
 */
export const LatestReportQuery = gql`
query GetAvailableReport($id: ID!, $type: ReportTypesEnum) {
    getReport(id: $id, type: $type) {
      PublicRecordReport {
        ReportDate
        ReportStatus
      }
      PublicRecordNonFCRAReport {
        TransactionID
        Notes
        ReportDate
        ReportStatus
      }
      CreditReportData {
        ReportDate
        ReportStatus
      }
      ReportDate
    }
  }
`;
