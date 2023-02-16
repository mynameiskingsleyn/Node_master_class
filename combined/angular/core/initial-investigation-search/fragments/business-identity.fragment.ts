import {gql} from '@apollo/client/core';

/**
 * Business Identity Fragment
 */
export const BusinessIdentity = gql`
fragment BusinessIdentity on BusinessIdentity {
  DotID
  EmpID
  POWID
  ProxID
  SeleID
  OrgID
  UltID
}`;
