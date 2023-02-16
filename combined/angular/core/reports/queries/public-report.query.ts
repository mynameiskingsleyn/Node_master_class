import {gql} from '@apollo/client/core';

import { SubjectEcho } from '../fragments/subject-echo.fragment';
import { SubjectInformation } from '../fragments/subject-information.fragment';
import { PublicReport } from '../fragments/public-record.fragment';

import { PublicReportExp } from '@app/core/initial-investigation-search/fragments/public-record-exp.fragment';
import { SubjectEchoExp } from '@app/core/initial-investigation-search/fragments/subject-echo-exp.fragment';
import { SubjectInformationExp } from '@app/core/initial-investigation-search/fragments/subject-information-exp.fragment';


/**
 * Public Report Query
 */
export const PublicReportQuery = gql`
query GetPublicRecordReport($id: ID!, $type: ReportTypesEnum, $historyId: Float) {
    getReport(id: $id, type: $type, historyId: $historyId) {
      ...SubjectEcho
      ...SubjectInformation
      ...PublicReport
      ReportDate
    }
  }
${SubjectEcho}
${SubjectInformation}
${PublicReport}
`;

/**
 * Public Report Query
 */
export const PublicReportQueryExp = gql`
query GetPublicRecordReport($id: ID!, $type: ReportTypesEnum, $historyId: Float) {
    getReportExp(id: $id, type: $type, historyId: $historyId) {
      ... on InsiderReportExp {
          PublicRecordReportFormat
          PublicRecordReportStatus
          ...SubjectEchoExp
          ...SubjectInformationExp
          ...PublicReportExp
          ReportDate
      }
      ... on InsiderReport {
          ...SubjectEcho
          ...SubjectInformation
          ...PublicReport
          ReportDate
      }
    }
  }
${ SubjectEchoExp }
${ SubjectInformationExp }
${ SubjectEcho }
${ SubjectInformation }
${ PublicReportExp }
${ PublicReport }
`;
