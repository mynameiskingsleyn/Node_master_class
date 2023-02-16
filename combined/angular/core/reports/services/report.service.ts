import { Injectable } from '@angular/core';
import { Apollo } from 'apollo-angular';
import { Observable, of } from 'rxjs';
import { ReportsQuery } from '../queries/reports.query';
import { PublicReportQuery } from '../queries/public-report.query';
import { PublicReportQueryExp } from '../queries/public-report.query';
import { CreditReportQuery } from '../queries/credit-report.query';
import { CombinedReportQuery } from '../queries/combined-report.query';
import { GlobalSearchService } from '@app/core/utils/global-search.service';
import { ReportType } from '@app/core/utils/reports/report-type.enum';
import { ReportFormat } from '@app/core/utils/reports/report-format.enum';
import { PublicRecordNonFCRAReportQuery } from '../queries/nonfcra-report.query';
import { AddAgencyNoteMutation } from '@app/core/search/mutations/add-agency-note.mutation';
import { AgencyNotesQuery } from '../queries/agency-notes.query';
import { DeleteAgencyNoteMutation } from '@app/core/search/mutations/delete-agency-note.mutation';
import { DocumentNode } from 'graphql';
import { map } from 'rxjs/operators';
import { LatestReportQuery } from '../queries/latest-report.query';

interface ReportQueries {
  readonly [key: string]: DocumentNode;
}

const EXTENDED = 'EX';

@Injectable()
export class ReportService {

  private reportQueries: ReportQueries = {
    PREX: PublicReportQueryExp,
    PR: PublicReportQuery,
    CR: CreditReportQuery,
    NR: PublicRecordNonFCRAReportQuery,
    COMPLETE: CombinedReportQuery
  };

  constructor(private apollo: Apollo, private search: GlobalSearchService) { }

  fetch(params: any): Observable<any> {
    return this.getReports(params);
  }

  get(type: string, reportId: string, historyReportId: string = null, prQuery: string = null): Observable<any> {
    let ex = '' ;
    if(type === ReportType.PUBLIC_RECORD ) {
      ex = (prQuery === ReportFormat.PUBLIC_RECORD_EXP) ? EXTENDED : '';
    }
    return this.apollo.watchQuery({
      query: this.reportQueries[type.toUpperCase() + ex],
      variables: {
        id: reportId,
        type: type.toUpperCase(),
        historyId: Number(historyReportId)
      },
    }).valueChanges;
  }

  load(type: string, reportId: string, historyReportId: string = null, prQuery: string = null) {
    let reportHolder = 'getReport';
    if ((type === ReportType.PUBLIC_RECORD) && prQuery && prQuery === ReportFormat.PUBLIC_RECORD_EXP) {
      reportHolder = 'getReportExp';
    }
    return this.get(type, reportId, historyReportId, prQuery).pipe(
      map((result: any) => {
        if (result.data && result.data[reportHolder]) {
          const reportType = type.toLowerCase();
          const reportData = this.getReportData(reportType, result, reportHolder);
          reportData.Error = result.errors || null;
          return reportData;
        }
      })
    );
  }

  getReportData(type, result, reportHolder) {

    let report = null;

    if (result && result.data && result.data[reportHolder]) {
      if (type === ReportType.PUBLIC_RECORD) {
        report = result.data[reportHolder].PublicRecordReport || null;
      }

      if (type === ReportType.CREDIT_REPORT) {
        report = result.data[reportHolder].CreditReportData.CreditReport || null;
      }

      if (type === ReportType.NONFCRA_REPORT) {
        report = result.data[reportHolder].PublicRecordNonFCRAReport || null;
      }

      if (type === ReportType.COMPLETE_REPORT) {
        report = {
          PublicRecordReport: result.data[reportHolder].PublicRecordReport || null,
          CreditReport: result.data[reportHolder].CreditReportData ? (result.data[reportHolder].CreditReportData.CreditReport || null) : null,
          PublicRecordNonFCRAReport: result.data[reportHolder].PublicRecordNonFCRAReport || null,
        };

        if (report.PublicRecordReport) {
          report.PublicRecordReport.SubjectEcho = result.data[reportHolder].SubjectEcho || null;
          report.PublicRecordReport.SubjectInformation = result.data[reportHolder].SubjectInformation || null;
        }

        if (report.CreditReport) {
          report.CreditReport.SubjectEcho = result.data[reportHolder].SubjectEcho || null;
          report.CreditReport.SubjectInformation = result.data[reportHolder].SubjectInformation || null;
        }

        if (report.PublicRecordNonFCRAReport) {
          report.PublicRecordNonFCRAReport.SubjectEcho = result.data[reportHolder].SubjectEcho || null;
          report.PublicRecordNonFCRAReport.SubjectInformation = result.data[reportHolder].SubjectInformation || null;
        }

        report.ReportDate = result.data[reportHolder].ReportDate || null;
      }

      // append Public record report format
      report.prFormat = result.data[reportHolder].PublicRecordReportFormat ? result.data[reportHolder].PublicRecordReportFormat : ReportFormat.PUBLIC_RECORD_LEGACY;
      // append echo & subject information
      report.SubjectEcho = result.data[reportHolder].SubjectEcho || null;
      report.SubjectInformation = result.data[reportHolder].SubjectInformation || null;
    }
    return report;
  }

  /**
   * Gets list of reports
   * @param params criterion
   * @returns Observable<any>
   */
  getReports(params = []): Observable<any> {
    return this.apollo.watchQuery({
      query: ReportsQuery,
      variables: params,
    }).valueChanges;
  }

  /**
   * Query to get Public Record Report
   * @param reportId UniqueID of report
   * @param historyReportId HistoryID of the report
   * @returns Observable<any>
   */
  getPublicReport(reportId: string, historyReportId: string = null): Observable<any> {
    return this.apollo.watchQuery({
      query: PublicReportQuery,
      variables: {
        id: reportId,
        type: ReportType.PUBLIC_RECORD.toUpperCase(),
        historyId: Number(historyReportId)
      },
    }).valueChanges;
  }

  /**
   * Query to get Credit Report
   * @param reportId UniqueID of report
   * @param historyReportId HistoryID of the report
   * @returns Observable<any>
   */
  getCreditReport(reportId: string, historyReportId: string = null): Observable<any> {
    return this.apollo.watchQuery({
      query: CreditReportQuery,
      variables: {
        id: reportId,
        type: ReportType.CREDIT_REPORT.toUpperCase(),
        historyId: Number(historyReportId)
      },
    }).valueChanges;
  }

  /**
   * Query to get Combined Report (Public Record plus Credit Record)
   * @param reportId UniqueID of the report
   * @returns Observable<any>
   */
  getCombinedReport(reportId: string): Observable<any> {
    return this.apollo.watchQuery({
      query: CombinedReportQuery,
      variables: {
        id: reportId,
        type: ReportType.COMPLETE_REPORT.toUpperCase()
      },
    }).valueChanges;
  }

  /**
   * Query to get Non-FCRA Public Report
   * @param reportId Unique ID of the report
   * @returns Observable<any>
   */
  getPublicRecordNonFCRAReport(reportId: string, historyReportId: string = null): Observable<any> {
    return this.apollo.watchQuery({
      query: PublicRecordNonFCRAReportQuery,
      variables: {
        id: reportId,
        type: ReportType.NONFCRA_REPORT.toUpperCase(),
        historyId: Number(historyReportId)
      },
    }).valueChanges;
  }

  addAgencyNote(notes: string, reportId: number, type: string): Observable<any> {
    return this.apollo.mutate({
      mutation: AddAgencyNoteMutation,
      variables: {
        notes,
        report_id: Number(reportId),
        type: type.toUpperCase()
      },
    });
  }

  agencyNotes(reports: [number]): Observable<any> {
    return this.apollo.watchQuery({
      query: AgencyNotesQuery,
      variables: {
        reports,
      },
    }).valueChanges;
  }

  deleteAgencyNote(reportId: number, type: string): Observable<any> {
    return this.apollo.mutate({
      mutation: DeleteAgencyNoteMutation,
      variables: {
        report_id: Number(reportId),
        type: type.toUpperCase()
      },
    });
  }

  /**
   * Query to get latest Report
   * @param reportId UniqueID of the report(subjectId)
   * @returns Observable<any>
   */
  getLatestReport(reportId: string): Observable<any> {
    return this.apollo.watchQuery({
      query: LatestReportQuery,
      variables: {
        id: reportId,
        type: ReportType.COMPLETE_REPORT.toUpperCase()
      },
    }).valueChanges;
  }

}
