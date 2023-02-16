import { Injectable } from '@angular/core';
import { Apollo } from 'apollo-angular';
import { Observable } from 'rxjs';
import { HistoryQuery } from '../queries/history.query';
import { DataSourceService } from '../interfaces/datasource-service.interface';

@Injectable({
  providedIn: 'root'
})
export class HistoryService implements DataSourceService {

  constructor(private apollo: Apollo) { }

  history(args: object): Observable<any> {
    return this.apollo.watchQuery({
      query: HistoryQuery,
      variables: {
        ...args
      },
    }).valueChanges;
  }

  fetch(args: any) {
    return this.history(args);
  }
}
