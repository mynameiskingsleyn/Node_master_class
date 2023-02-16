import {gql} from '@apollo/client/core';
import { RunReportCreditReport } from '../fragments/run-report-credit-record.fragment';

/**
 * Login mutation
 */
export const RunReportMutation = gql`
mutation RunReport($subject: SubjectInfoInput, $type: ReportTypesEnum) {
	runReport(Subject: $subject, ReportType: $type) {
    result {
			PubRecReportId
			CreditReportId
      SubjectId
      Lexid
      LastName
    }
		InsiderReport{
				PublicRecordReportStatus
				PublicRecordReportFormat
				PublicRecordReportDate
				...CreditReport
				ReportDate
		}
    status
    description
  }
}

${RunReportCreditReport}
`;
