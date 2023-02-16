import {gql} from '@apollo/client/core';

/**
 * Login mutation
 */
export const StopWatchMutation = gql`
mutation stopWatchingSubject($recordId: Int) {
    stopWatch(record_id: $recordId)
}
`;
