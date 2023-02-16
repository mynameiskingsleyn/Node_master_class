import {gql} from '@apollo/client/core';
import { Address } from './address.fragment';
import { Party } from './party.fragment';
import { PhoneTimeZone } from './phone-timezone.fragment';


/**
 * Third Party Fragment
 */
export const ThirdParty = gql`
fragment ThirdParty on ThirdParty {
  HasCriminalConviction
  IsSexualOffender
  OriginName
  Address {
    ...Address
  }
  Addresses {
    Address {
      ...Address
    }
  }
  Phones {
    Phone {
      ...PhoneTimeZone
    }
  }
  ParsedParties {
    Party {
      ...Party
    }
  }
}
${Address}
${Party}
${ PhoneTimeZone }
`;
