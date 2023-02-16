import {gql} from '@apollo/client/core';

export const SubjectQuery = gql`
query GetSubject($subjectId: String!, $lexId: Float!, $lastName: String!) {
  getSubject(SubjectId: $subjectId, Lexid: $lexId, LastName: $lastName) {
    result {
      Name {
        First
        Last
        Middle
        Full
      }
      Address {
        StreetAddress1
        StreetAddress2
        City
        State
        Zip5
      }
      DOB {
        Day
        Month
        Year
      }
    }
    status
  }
}
`;
