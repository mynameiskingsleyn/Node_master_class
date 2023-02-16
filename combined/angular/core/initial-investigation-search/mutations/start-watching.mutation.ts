import {gql} from '@apollo/client/core';

/**
 * Login mutation
 */
export const StartWatchMutation = gql`
mutation startWatchingSubject($recordId: Int) {
    startWatch(record_id: $recordId)
}
`;
