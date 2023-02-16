import {gql} from '@apollo/client/core';

/**
 * Date Fragment
 */
export const Date = gql`
fragment Date on Date {
  Year
  Month
  Day
}`
