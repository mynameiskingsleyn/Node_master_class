import {gql} from '@apollo/client/core';

/**
 * Address Fragment
 */
export const Address = gql`
fragment Address on Address {
  StreetNumber
  StreetPreDirection
  StreetName
  StreetSuffix
  StreetPostDirection
  UnitDesignation
  UnitNumber
  StreetAddress1
  StreetAddress2
  City
  State
  Zip5
  Zip4
  County
  PostalCode
  StateCityZip
  Latitude
  Longitude
}`
