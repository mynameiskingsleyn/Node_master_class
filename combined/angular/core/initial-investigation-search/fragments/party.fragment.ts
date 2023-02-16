import {gql} from '@apollo/client/core';
import { BusinessIdentity } from './business-identity.fragment';
import { Name } from './name.fragment';

/**
 * Party Fragment
 */
export const Party = gql`
fragment Party on Party {
  HasCriminalConviction
  IsSexualOffender
  BusinessIds {
    ...BusinessIdentity
  }
  IdValue
  Name {
    ...Name
  }
  CompanyName
  UniqueId
  BusinessId
  SSN
  FEIN
  PersonFilterId
  TaxId
  IsDisputed
  StatementIdRecs {
    StatementIdRec {
      StatementId
    }
  }
}
${BusinessIdentity}
${Name}`
