import gql from 'graphql-tag';

export const NumReports = gql`
query GetNumReports {
  numReports
}
`;
