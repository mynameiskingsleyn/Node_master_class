import {gql} from '@apollo/client/core';

/**
 * Individual Echo Fragment
 */
export const SubjectEchoExp = gql`
fragment SubjectEchoExp on InsiderReportExp {
    SubjectEcho {
        SubjectId
        Lexid
        LastName
    }
}
`;
