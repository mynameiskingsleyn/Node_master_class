import {gql} from '@apollo/client/core';
import { PublicReportExp } from '../fragments/public-record-exp.fragment';
import { PublicRecordNonFCRAReport } from '../fragments/nonfcra-report.fragment';

/**
 * Login mutation
 */
export const RequestNewReportMutation = gql`
mutation RequestNewReport($subject: EnrollFormInput) {
  	requestNewReport(Subject: $subject) {
        subjectInfo {
            SubjectId
            Lexid
            LastName
            PubRecReportId
            PubRecNonFCRAReportId
            CreditReportId
        }
        InsiderReport{
            PublicRecordReportStatus
            PublicRecordReportFormat
            PublicRecordNonFCRAReportStatus
            PublicRecordReportDate
            ...PublicReportExp
            ...PublicRecordNonFCRAReport
            CreditReportData {
              ReportDate
              ReportStatus
            }
            ReportDate
        }
        status
        description
  }
}
${PublicReportExp}
${PublicRecordNonFCRAReport}
`;
