import {
  Component,
  OnInit,
  Input,
  ViewChild,
  ViewContainerRef,
  QueryList,
  ViewChildren,
  AfterViewInit,
  OnDestroy,
  OnChanges,
  SimpleChanges,
  ChangeDetectionStrategy,
  Inject
} from '@angular/core';
import { MatPaginator, PageEvent } from '@angular/material/paginator';
import { MatSort } from '@angular/material/sort';
import { MatDialog } from '@angular/material/dialog';
import { MatTable } from '@angular/material/table';
import { MatSnackBar } from '@angular/material/snack-bar';
import { Alerts } from '../models/alerts.model';
import { trigger, state, style, transition, animate } from '@angular/animations';
import { PopOverService } from '@app/shared/services/popover.service';
import { SubjectInfoComponent } from '@app/shared/components/subject-info/subject-info.component';
import { Report } from '@app/core/reports/models/report.model';
import { AlertsService } from '../services/alerts.service';
import { StopAlertDialogComponent } from '../components/stop-alert-dialog/stop-alert-dialog.component';
import { SearchService } from '@app/core/search/services/search.service';
import { AlertsDataSource } from '../alerts-datasource';
import { Subscription } from 'rxjs';
import { ReportType } from '@app/core/utils/reports/report-type.enum';
import { ACL_ROUTES } from '@app/shared/services/acl/config/acl-routes';
import { AclRoutesInterface } from '@app/shared/services/acl/config/acl-routes.interface';
import { ColumnDefinitionsService } from '@app/shared/services/column-definitions.service';
import { PERMISSIONS_VALUES as permissionValues } from '@app/shared/services/acl/config/acl-roles-permissions';
import { NoRecordDialogComponent } from '@app/shared/components/no-record-dialog/no-record-dialog.component';
import { AddNoteDialogComponent } from '@app/shared/components/add-note-dialog/add-note-dialog.component';
import { ViewNotesDialogComponent } from '@app/shared/components/view-notes-dialog/view-notes-dialog.component';
import { ReportStatus } from '@app/core/utils/reports/report-status.enum';

@Component({
  selector: 'app-alerts-list',
  templateUrl: './alerts-list.component.html',
  styleUrls: ['./alerts-list.component.scss'],
  animations: [
    trigger('detailExpand', [
      state('collapsed', style({height: '0px', minHeight: '0'})),
      state('expanded', style({height: '*'})),
      transition('expanded <=> collapsed', animate('225ms cubic-bezier(0.4, 0.0, 0.2, 1)')),
    ]),
  ],
  changeDetection: ChangeDetectionStrategy.OnPush
})
export class AlertsListComponent implements OnInit, AfterViewInit, OnDestroy, OnChanges {

  @ViewChild(MatTable, { static: true }) table: MatTable<any>;
  @ViewChild(MatPaginator, { static: true }) paginator: MatPaginator;
  @ViewChild('subjectInfo', { read: ViewContainerRef, static: false }) subjectInfo: ViewContainerRef;
  @ViewChildren(MatPaginator) paginators!: QueryList<MatPaginator>;
  @ViewChild(MatSort, { static: true }) sort: MatSort;

  page: PageEvent = {
    length: 1,
    pageIndex: 0,
    pageSize: 15,
  };

  pageSizeOptions = [15, 25, 50, 75, 100];
  dataSourceResults: Alerts[];

  @Input() results: any[];

  dataSource: AlertsDataSource;

  expandedElement: null;

  subs: Subscription = new Subscription();
  readonly reportStatus = ReportStatus;

  /** Columns displayed in the table. Columns IDs can be added, removed, or reordered. */
  displayedColumns: string[];

  permissions = permissionValues;

  constructor(
    private dialog: MatDialog,
    private popover: PopOverService,
    private snackbar: MatSnackBar,
    private alertService: AlertsService,
    private searchService: SearchService,
    private columnDefinitions: ColumnDefinitionsService,
    @Inject(ACL_ROUTES) public ACL: AclRoutesInterface
  ) { }

  ngOnInit() {
    this.displayedColumns = this.columnDefinitions.alertsColumns();
    this.dataSource = new AlertsDataSource(this.alertService);
  }

  ngOnDestroy() {
    if (this.sort.sortChange) {
      this.sort.sortChange.unsubscribe();
    }

    this.paginators.forEach(paginator => {
      if (paginator.page) {
        paginator.page.unsubscribe();
      }
    });
    this.subs.unsubscribe();
    this.dialog.closeAll();
  }

  ngOnChanges(changes: SimpleChanges) {
      if (changes.hasOwnProperty('results')) {
        const chng = changes.results;
        const cur  = chng.currentValue;
        this.dataSourceResults = cur;

        if (this.dataSource) {
          this.dataSource.setData(this.dataSourceResults, this.page);
        }
      }
  }

  ngAfterViewInit() {
    this.dataSource.paginators = this.paginators;
    this.dataSource.sort = this.sort;

    this.sort.sortChange.subscribe($event => this.sortingChanged($event));

    this.paginators.map(paginator => {
        paginator.pageSizeOptions = this.pageSizeOptions;
        paginator.page.subscribe($event => this.pageChanged($event));
    });

    this.dataSource.setData(this.dataSourceResults, this.page);
  }

  showRecordMetadata(event, report: Report) {
    event.stopPropagation();
    const popoverPosition = this.popover.getPopoverPosition(event.target);
    this.popover.open(SubjectInfoComponent, {
      data: {
        uniqueId: report.unique_id,
        lexId: report.lexid,
        lastName: report.name_last,
        top: popoverPosition.top,
        left: popoverPosition.left,
        offsetLeft: popoverPosition.offsetLeft
      }
    });
  }

  showMessage(message: string) {
    this.snackbar.open(message, null, {
      duration: 2000,
      horizontalPosition: 'right',
      verticalPosition: 'bottom'
    });
  }

  onWatchChange(report) {
    if (report.watcher) {
      this.stopAlertDialog(report);
    }
  }

  stopWatchReport(report) {
    if (report.watcher) {
      this.subs.add(
        this.alertService.stopWatch(report.record_id).subscribe(data => {
            if (data.data.stopWatch) {
              this.showMessage('The individual was removed from the monitoring list.');
              this.dataSource.fetch(this.dataSource.page, 'alerts');
            }
        })
      );
    }
  }

  stopAlertDialog(report): void {
    const dialogRef = this.dialog.open(StopAlertDialogComponent, {
        width: '450px',
        data: {}
    });

    dialogRef.afterClosed().subscribe(result => {
      if (result) {
          this.stopWatchReport(report);
      }
    });
  }

  reportView(reportType, element) {
    const token = JSON.stringify({
                    id: element.unique_id,
                    type: reportType,
                    historyId: null
                  });
    return this.ACL.REPORTS.replace('/(.*)', '') + '/' + reportType + '/' + btoa(token);
  }

  runReport(event: {report: any, type: ReportType}) {
    this.subs.add(
      this.searchService.runReport({
            SubjectId: event.report.unique_id,
            Lexid: Number(event.report.lexid),
            LastName: event.report.name_last
        },
            event.type
        ).subscribe(data => {
          if (data.data.runReport.status) {
            this.showMessage('A new report is being processed.');
          } else {
            this.showMessage(data.data.runReport.description);
          }
      })
    );
  }

  trackBy(index, item) {
    return item.unique_id;
  }

  pageChanged($event: PageEvent) {
     // sync paginators: top | bottom
      this.paginators.map(paginator => {
          paginator.pageIndex = $event.pageIndex;
          paginator.pageSize = $event.pageSize;
      });

      // set current page event
      this.dataSource.page = $event;

      // re-fetch paginated results
      this.dataSource.fetch($event, 'alerts');
  }

  sortingChanged($event) {
      this.dataSource.fetch($event, 'alerts');
  }

  crNoRecord(record, $event) {

    const crReport = {
      ...record,
      output_type: ReportType.CREDIT_REPORT,
      date_returned: record.max_cr_date,
      report_id: record.cr_id
    };

    $event.stopPropagation();
    this.dialog.closeAll();

    const dialogRef = this.dialog.open(NoRecordDialogComponent, {
      id: 'credit-source-dialog',
      width: '500px',
      height: '200px',
      panelClass: 'no-record-dialog',
      data: {
        title: 'Credit Report',
        report: crReport
      }
    });

    return false;
  }

  addAgencyNote(report) {

    this.dialog.closeAll();

    const dialogRef = this.dialog.open(AddNoteDialogComponent, {
      id: 'agency-note-dialog',
      width: '680px',
      height: '300px',
      panelClass: 'agency-note-dialog',
      data: {
        title: 'Add Agency Note',
        ...report
      }
    });

    return false;
  }

  viewReportsNotes(report) {

    this.dialog.closeAll();

    const reports = [
      Number(report.pr_id),
      Number(report.cr_id),
      Number(report.nr_id),
    ];

    const dialogRef = this.dialog.open(ViewNotesDialogComponent, {
      id: 'view-notes-dialog',
      width: '680px',
      height: '400px',
      panelClass: 'view-notes-dialog',
      data: {
        title: 'Agency Notes',
        reports,
        ...report
      }
    });

    return false;
  }

}
