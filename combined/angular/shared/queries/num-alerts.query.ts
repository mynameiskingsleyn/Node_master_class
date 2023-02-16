import {gql} from '@apollo/client/core';

export const NumAlerts = gql`
query GetNumAlerts {
  numAlerts
}
`;
