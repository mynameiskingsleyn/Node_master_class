import gql from 'graphql-tag';

/**
 * Public Report Query
 */
export const AgencyNotesQuery = gql`
query AgencyNotes($reports: [Int]) {
    agencyNotes(reports: $reports) {
      type
      reportId
      notes
    }
  }
`;
