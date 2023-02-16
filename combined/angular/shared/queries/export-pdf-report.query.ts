import {gql} from '@apollo/client/core';

export const ExportPdfReportQuery = gql`
query ExportReportPdf ($type: String!, $uniqueId: String!, $lexId: Float!, $reportDate: String!, $historyId: Float, $prQuery: String, $prFormat: String) {
  exportReportPdf (type: $type, unique_id: $uniqueId, lexid: $lexId, report_date: $reportDate, history_id: $historyId, prQuery: $prQuery, prFormat: $prFormat) {
    report
    filename
  }
}
`;
