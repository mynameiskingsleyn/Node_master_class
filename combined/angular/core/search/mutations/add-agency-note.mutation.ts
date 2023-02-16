import gql from 'graphql-tag';

/**
 * Login mutation
 */
export const AddAgencyNoteMutation = gql`
mutation addAgencyNote($notes: String, $report_id: Int, $type: ReportTypesEnum) {
    addAgencyNote(notes: $notes, report_id: $report_id, type: $type)
}
`;
