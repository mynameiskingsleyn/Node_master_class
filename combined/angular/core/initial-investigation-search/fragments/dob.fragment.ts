import {gql} from '@apollo/client/core';

/**
 * Date Fragment
 */
export const Dob = gql`
fragment Dob on DOB {
  Year
  Month
  Day
}`
