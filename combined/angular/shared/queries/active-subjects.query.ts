import {gql} from '@apollo/client/core';

export const ActiveSubjects = gql`
query GetActiveSubjects {
  activeSubjects
}
`;
