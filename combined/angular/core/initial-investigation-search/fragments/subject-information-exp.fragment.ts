import {gql} from '@apollo/client/core';
import { Name } from './name.fragment';
import { Address } from './address.fragment';
import { Dob } from './dob.fragment';

/**
 * Individual Information Fragment
 */
export const SubjectInformationExp = gql`
fragment SubjectInformationExp on InsiderReportExp {
    SubjectInformation {
        Name {
            ...Name
        }
        Address {
            ...Address
        }
        DOB {
            ...Dob
        }
        SSN
    }
}
${Name}
${Address}
${Dob}
`;
