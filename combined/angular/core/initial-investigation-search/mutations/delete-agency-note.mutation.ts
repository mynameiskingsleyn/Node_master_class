import gql from 'graphql-tag';

/**
 * Login mutation
 */
export const DeleteAgencyNoteMutation = gql`
mutation deleteAgencyNote($report_id: Int, $type: ReportTypesEnum) {
  deleteAgencyNote(report_id: $report_id, type: $type)
}
`;
