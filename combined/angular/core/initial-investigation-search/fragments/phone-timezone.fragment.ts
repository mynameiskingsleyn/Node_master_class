import {gql} from '@apollo/client/core';

/**
 * Phone TimeZone Fragment
 */
export const PhoneTimeZone = gql`
fragment PhoneTimeZone on PhoneTimeZone {
  Phone10
  Fax
  TimeZone
}`;
