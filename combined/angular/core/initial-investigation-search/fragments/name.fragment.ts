import {gql} from '@apollo/client/core';

/**
 * Name Fragment
 */
export const Name = gql`
fragment Name on Name {
  Full
  First
  Middle
  Last
  Suffix
  Prefix
}`
