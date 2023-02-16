import {gql} from '@apollo/client/core';

/**
 * Login mutation
 */
export const EnrollSubjectMutation = gql`
mutation EnrollSubject($subject: EnrollFormInput) {
  	enrollSubject(Subject: $subject) {
        result {
            SubjectId
            Lexid
            LastName
        }
        status
        description
  }
}
`;
