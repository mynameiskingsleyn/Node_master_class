import { Component, OnInit, Input, OnDestroy, ViewChild, ViewChildren, QueryList, AfterViewInit,
         ChangeDetectionStrategy, ChangeDetectorRef, Inject } from '@angular/core';
import { HistoryService } from '@app/shared/services/history.service';
import { Subscription } from 'rxjs';
import { MatPaginator, PageEvent } from '@angular/material/paginator';
import { MatSort } from '@angular/material/sort';
import { MatDialog } from '@angular/material/dialog';
import { HistoryDataSource } from './history.datasource';
import { MessageDialogComponent } from '../message-dialog/message-dialog.component';
import { SearchService } from '@app/core/search/services/search.service';
import { SubjectInfo } from '@app/shared/interfaces/subject-info.interface';
import { ReportType } from '@app/core/utils/reports/report-type.enum';
import { ACL_ROUTES } from '@app/shared/services/acl/config/acl-routes';
import { AclRoutesInterface } from '@app/shared/services/acl/config/acl-routes.interface';
import { NoRecordDialogComponent } from '../no-record-dialog/no-record-dialog.component';
import { ReportStatus } from '@app/core/utils/reports/report-status.enum';

@Component({
  selector: 'app-history',
  templateUrl: './history.component.html',
  styleUrls: ['./history.component.scss'],
  changeDetection: ChangeDetectionStrategy.OnPush
})
export class HistoryComponent implements OnInit, OnDestroy, AfterViewInit {

  @ViewChildren(MatPaginator) paginators!: QueryList<MatPaginator>;
  @ViewChild(MatSort, { static: true }) sort: MatSort;

  page: PageEvent = {
    length: 1,
    pageIndex: 0,
    pageSize: 15,
  };

  @Input() subject: SubjectInfo;

  dataSource: HistoryDataSource;
  pageSizeOptions = [15, 25, 50, 75, 100];

  displayedColumns = ['unique_id', 'lexid', 'name_first', 'name_last', 'date_returned', 'output_type', 'status'];

  loading = true;

  readonly reportStatus = ReportStatus;

  private subscription: Subscription;

  constructor(private historyService: HistoryService,
              private cdr: ChangeDetectorRef,
              private searchService: SearchService,
              private dialog: MatDialog,
              @Inject(ACL_ROUTES) public ACL: AclRoutesInterface
            ) { }

  ngOnInit() {
    this.dataSource = new HistoryDataSource(this.historyService);
  }

  ngAfterViewInit() {
    this.dataSource.paginators = this.paginators;
    this.dataSource.sort = this.sort;

    this.sort.sortChange.subscribe($event => this.sortingChanged($event));

    this.paginators.map(paginator => {
        paginator.pageSizeOptions = this.pageSizeOptions;
        paginator.page.subscribe($event => this.pageChanged($event));
    });

    this.dataSource.loading$.subscribe((loading) => {
      this.loading = loading;
      if (!loading) {
        this.cdr.detectChanges();
      }
    });

    const args = {
      uniqueId: this.subject.unique_id
    };

    this.loading = true;
    this.subscription = this.historyService.history(args).subscribe(result => {
      if (result.data && result.data.history.data) {
        this.dataSource.setData(result.data.history, this.page);
        this.loading = false;
        this.cdr.detectChanges();
      }
    });
  }

  ngOnDestroy() {
    if (this.subscription) {
      this.subscription.unsubscribe();
    }
  }

  reportView(reportType: string, element) {
    const token = {
      id: element.unique_id,
      historyId: element.report_id,
      lexId: this.subject.lexid,
      type: reportType.toLowerCase()
    };
    return this.ACL.REPORTS_HISTORY.replace('/(.*)', '') + '/' + reportType.toLowerCase() + '/' + btoa(JSON.stringify(token));
  }

  pageChanged($event: PageEvent) {
     this.paginators.map(paginator => {
         paginator.pageIndex = $event.pageIndex;
         paginator.pageSize = $event.pageSize;
     });
     this.dataSource.page = $event;
     this.dataSource.fetch({ uniqueId: this.subject.unique_id }, 'history');
     this.cdr.detectChanges();
 }

 sortingChanged($event) {
     this.dataSource.fetch({ uniqueId: this.subject.unique_id }, 'history');
     this.cdr.detectChanges();
 }

 trackBy(index, item) {
  return item.report_id;
 }

 crNoRecord(record, $event) {

  $event.stopPropagation();
  this.dialog.closeAll();

  const dialogRef = this.dialog.open(NoRecordDialogComponent, {
    id: 'credit-source-dialog',
    width: '500px',
    height: '200px',
    panelClass: 'no-record-dialog',
    data: {
      title: 'Credit Report',
      report: record
    }
  });

  return false;
}

  getReportType(type: string) {
    switch (type.toLowerCase()) {
      case ReportType.PUBLIC_RECORD:
        return 'FCRA PR';
        break;
      case ReportType.CREDIT_REPORT:
        return 'Credit';
        break;
      case ReportType.NONFCRA_REPORT:
        return 'Non-FCRA PR';
        break;
      default:
        return '';
        break;
    }
  }

}
