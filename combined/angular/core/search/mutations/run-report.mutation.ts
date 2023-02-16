import {gql} from '@apollo/client/core';

/**
 * Login mutation
 */
export const RunReportMutation = gql`
mutation RunReport($subject: SubjectInfoInput, $type: ReportTypesEnum) {
	runReport(Subject: $subject, ReportType: $type) {
    result {
      SubjectId
      Lexid
      LastName
    }
    status
    description
  }
}
`;
