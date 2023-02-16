export interface ExportParams {
  reportType: string;
  uniqueId: string;
  lexid: string | number;
  reportDate: string;
  historyId?: string | number;
  prQuery?: string;
  prFormat?: string;
}
