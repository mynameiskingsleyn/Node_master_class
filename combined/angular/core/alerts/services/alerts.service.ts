import { Injectable } from '@angular/core';
import { Apollo } from 'apollo-angular';
import { Observable } from 'rxjs';
import { AlertsQuery } from '../queries/alerts.query';
import { StopWatchMutation } from '@app/core/search/mutations/stop-watching.mutation';
import { SearchReportsQuery } from '@app/core/search/queries/search-reports.query';
import { GlobalSearchService } from '@app/core/utils/global-search.service';
import { NumAlerts } from '@app/shared/queries/num-alerts.query';

@Injectable({
  providedIn: 'root'
})
export class AlertsService {

  constructor(
    private apollo: Apollo,
    private globalSearchService: GlobalSearchService
    ) { }

  fetch(params: any): Observable<any> {
    return this.alerts(params);
  }

  alerts(params = {}): Observable<any> {
    return this.apollo.watchQuery({
      query: AlertsQuery,
      variables: params,
      notifyOnNetworkStatusChange: true
    }).valueChanges;
  }

  stopWatch(record): Observable<any> {
    const reQueries = [
      {
        query: NumAlerts,
        variables: {},
      }
    ];

    return this.apollo.mutate({
      mutation: StopWatchMutation,
      variables: {recordId: Number(record)},
      refetchQueries: reQueries,
    });
  }
}
