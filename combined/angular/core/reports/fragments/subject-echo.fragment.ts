import {gql} from '@apollo/client/core';

/**
 * Individual Echo Fragment
 */
export const SubjectEcho = gql`
fragment SubjectEcho on InsiderReport {
    SubjectEcho {
        SubjectId
        Lexid
        LastName
    }
}
`;
