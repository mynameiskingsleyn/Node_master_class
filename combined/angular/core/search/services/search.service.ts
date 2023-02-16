import { Injectable } from '@angular/core';
import { Apollo } from 'apollo-angular';
import { Observable } from 'rxjs';
import { EnrollSubjectMutation } from '../mutations/enroll.mutation';
import { SearchReportsQuery } from '../queries/search-reports.query';
import { StartWatchMutation } from '../mutations/start-watching.mutation';
import { StopWatchMutation } from '../mutations/stop-watching.mutation';
import { RunReportMutation } from '../mutations/run-report.mutation';
import { GlobalSearchService } from '@app/core/utils/global-search.service';
import { NumAlerts } from '@app/shared/queries/num-alerts.query';
import { ActiveSubjects } from '@app/shared/queries/active-subjects.query';
import { CreditReportStatusQuery } from '../queries/credit-report-status.query';
import { ReportType } from '@app/core/utils/reports/report-type.enum';

@Injectable({
  providedIn: 'root'
})
export class SearchService {

  constructor(private apollo: Apollo, private globalSearchService: GlobalSearchService) {}

  fetch(params: any): Observable<any> {
    return this.searchReports(params);
  }

  searchReports(params: object): Observable<any> {
    this.updateGlobalSearch(params);
    return this.apollo.watchQuery({
      query: SearchReportsQuery,
      variables: params,
    }).valueChanges;
  }

  enrollSubject(EnrollSubjectInput: object): Observable<any> {
    return this.apollo.mutate({
      mutation: EnrollSubjectMutation,
      variables: {subject: EnrollSubjectInput},
      refetchQueries: [
        {
          query: ActiveSubjects,
          variables: {},
        }
      ],
    });
  }

  runReport(SubjectInfoInput: object, type: ReportType): Observable<any> {
    return this.apollo.mutate({
      mutation: RunReportMutation,
      variables: {subject: SubjectInfoInput, type: type.toUpperCase()}
    });
  }

  startWatch(record): Observable<any> {
      return this.apollo.mutate({
        mutation: StartWatchMutation,
        variables: {recordId: Number(record)},
        refetchQueries: [
        {
          query: SearchReportsQuery,
          variables: { filters: this.last() },
        },
        {
          query: NumAlerts,
          variables: {},
        }
      ],
      });
  }

  stopWatch(record): Observable<any> {
    return this.apollo.mutate({
      mutation: StopWatchMutation,
      variables: {recordId: Number(record)},
      refetchQueries: [
      {
        query: SearchReportsQuery,
        variables: { filters: this.last() },
      },
      {
        query: NumAlerts,
        variables: {},
      }
    ],
    });
  }

  last() {
    return this.globalSearchService.searchFilters;
  }

  updateGlobalSearch(params: any) {
    if (typeof params === 'object' && params.hasOwnProperty('filters')) {
      this.globalSearchService.filters(params.filters);
    }
  }

  getCreditReportStatus(params): Observable<any> {
    return this.apollo.watchQuery({
      query: CreditReportStatusQuery,
      variables: {
        id: params.unique_id,
        type: ReportType.CREDIT_REPORT.toUpperCase(),
        historyId: Number(params.cr_id)
      },
    }).valueChanges;
  }

}
