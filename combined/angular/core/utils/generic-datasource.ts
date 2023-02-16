import { CollectionViewer, DataSource } from '@angular/cdk/collections';
import { MatPaginator, PageEvent } from '@angular/material/paginator';
import { MatSort, Sort } from '@angular/material/sort';
import { catchError, finalize } from 'rxjs/operators';
import {
  Observable,
  of as observableOf,
  BehaviorSubject,
  Subscription,
} from 'rxjs';
import { QueryList } from '@angular/core';
import { DataSourceService } from '@app/shared/interfaces/datasource-service.interface';

export class GenericDataSource<T> extends DataSource<T> {
  public data: Array<T> = [];
  public count = 0;
  private dataObs = new BehaviorSubject<T[]>([]);
  private loadingData = new BehaviorSubject<boolean>(false);

  public paginators: QueryList<MatPaginator>;
  public sort: MatSort;
  public page: PageEvent;

  public loading$ = this.loadingData.asObservable();

  dataSubscription: Subscription;

  constructor(private dsService: DataSourceService) {
    super();
  }

  setData(data, pageEvent: PageEvent) {
    this.loadingData.next(true);

    this.paginators.map(paginator => {
      paginator.length = data.total;
    });

    this.data = data.data;
    this.count = data.total;
    this.dataObs.next(this.data);
    this.loadingData.next(false);
  }

  fetch(params, resultField) {
    this.loadingData.next(true);

    if (this.page) {
      params.limit = this.page.pageSize;
      params.page = this.page.pageIndex;
    }

    if (this.sort) {
      if (this.sort.active) {
        params.sortBy = this.sort.active;
        if (this.sort.direction) {
          params.sortDir = this.sort.direction;
        }
      }
    }

    this.dataSubscription = this.dsService
      .fetch(params)
      .pipe(
        catchError(() => observableOf([])),
        finalize(() => this.loadingData.next(false))
      )
      .subscribe(resp => {
        if (resp.data && resp.data.hasOwnProperty(resultField)) {
            this.setData(resp.data[resultField], params);
        }
      });
  }

  /**
   * Connect this data source to the table. The table will only update when
   * the returned stream emits new items.
   * @returns A stream of the items to be rendered.
   */
  connect(collectionViewer: CollectionViewer): Observable<T[]> {
    return this.dataObs.asObservable();
  }

  /**
   *  Called when the table is being destroyed. Use this function, to clean up
   * any open connections or free any held resources that were set up during connect.
   */
  disconnect(collectionViewer: CollectionViewer): void {
    this.dataObs.complete();
    this.loadingData.complete();
    if (this.dataSubscription) {
      this.dataSubscription.unsubscribe();
    }
  }
}
