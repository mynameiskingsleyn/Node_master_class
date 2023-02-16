import {gql} from '@apollo/client/core';

/**
 * Login mutation
 */
export const MarkAsIncorrectMutation = gql`
mutation markAsIncorrectSubject($subject: RemoveSubjectInput) {
    removeSubject(Subject: $subject){
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
