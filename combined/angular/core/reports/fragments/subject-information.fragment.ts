import {gql} from '@apollo/client/core';

/**
 * Individual Information Fragment
 */
export const SubjectInformation = gql`
fragment SubjectInformation on InsiderReport {
    SubjectInformation {
        Name {
            Full
            First
            Middle
            Last
            Suffix
            Prefix
        }
        Address {
            StreetNumber
            StreetPreDirection
            StreetName
            StreetSuffix
            StreetPostDirection
            UnitDesignation
            UnitNumber
            StreetAddress1
            StreetAddress2
            City
            State
            Zip5
            Zip4
            County
            PostalCode
            StateCityZip
            Latitude
            Longitude
        }
        DOB {
            Day
            Month
            Year
        }
        SSN
    }
}
`;
