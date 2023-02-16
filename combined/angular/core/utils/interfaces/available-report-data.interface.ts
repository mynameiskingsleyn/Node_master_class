import { ReportType } from '@app/core/utils/reports/report-type.enum';

export interface AvailableReportData {
  subject: SubjectInfo;
  result: InsiderReport;
}

export interface SubjectInfo {
  SubjectId: string;
  Lexid: string;
  LastName: string;
}

export interface InsiderReport {
  PublicRecordReportStatus: string,
  PublicRecordNonFCRAReportStatus: string,
  PublicRecordReport: any;
  PublicRecordNonFCRAReport: any;
  CreditReportData: any;
}

export interface AvailableReportElement {
  name: string,
  type: ReportType,
  status: string,
  date: string
  report_id: string
}
