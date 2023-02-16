import {
  Component,
  ViewChild,
  OnInit,
  Input,
  OnDestroy,
  ViewContainerRef,
  QueryList,
  ViewChildren,
  AfterViewInit,
  OnChanges,
  SimpleChanges,
  ChangeDetectionStrategy,
  ChangeDetectorRef,
  Inject,
  AfterViewChecked
} from '@angular/core';
import { MatPaginator, PageEvent } from '@angular/material/paginator';
import { MatSort } from '@angular/material/sort';
import { MatSnackBar } from '@angular/material/snack-bar';
import { MatDialog } from '@angular/material/dialog';
import { FiltersDialogComponent } from '@app/shared/components/filters-dialog/filters-dialog.component';
import { trigger, state, style, transition, animate } from '@angular/animations';
import { Report } from './models/report.model';
import { PopOverService } from '@app/shared/services/popover.service';
import { SubjectInfoComponent } from '@app/shared/components/subject-info/subject-info.component';
import { SearchService } from '../search/services/search.service';
import { RemoveAlertDialogComponent } from '../search/components/remove-alert-dialog/remove-alert-dialog.component';
import { TriggerNonFCRADialogComponent } from '../search/components/trigger-non-fcradialog/trigger-non-fcradialog.component';
import { ReportsDataSource } from './reports-datasource';
import { LnxSearchService } from '@lnx/search';
import { Subscription } from 'rxjs';
import { ReportType } from '../utils/reports/report-type.enum';
import { ACL_ROUTES } from '@app/shared/services/acl/config/acl-routes';
import { AclRoutesInterface } from '@app/shared/services/acl/config/acl-routes.interface';
import { PERMISSIONS_VALUES as permissionValues } from '@app/shared/services/acl/config/acl-roles-permissions';
import { ColumnDefinitionsService } from '@app/shared/services/column-definitions.service';
import { NoRecordDialogComponent } from '@app/shared/components/no-record-dialog/no-record-dialog.component';
import { AddNoteDialogComponent } from '@app/shared/components/add-note-dialog/add-note-dialog.component';
import { ViewNotesDialogComponent } from '@app/shared/components/view-notes-dialog/view-notes-dialog.component';
import { ReportStatus } from '../utils/reports/report-status.enum';


@Component({
  selector: 'app-results',
  templateUrl: './results.component.html',
  styleUrls: ['./results.component.scss'],
  animations: [
    trigger('detailExpand', [
      state('collapsed', style({ height: '0px', minHeight: '0' })),
      state('expanded', style({ height: '*' })),
      transition(
        'expanded <=> collapsed',
        animate('225ms cubic-bezier(0.4, 0.0, 0.2, 1)')
      ),
    ]),
  ],
  changeDetection: ChangeDetectionStrategy.OnPush
})
export class ResultsComponent implements OnInit, OnDestroy, AfterViewInit, AfterViewChecked, OnChanges {

  @ViewChildren(MatPaginator) paginators!: QueryList<MatPaginator>;
  @ViewChild(MatSort, { static: true }) sort: MatSort;
  @ViewChild('subjectInfo', { read: ViewContainerRef, static: false })
  subjectInfo: ViewContainerRef;

  dataSource: ReportsDataSource;

  page: PageEvent = {
    length: 1,
    pageIndex: 0,
    pageSize: 15,
  };

  pageSizeOptions = [15, 25, 50, 75, 100];
  dataSourceResults: Report[];

  @Input() results: any[];
  expandedElement: null;

  displayedColumns: string[];

  subs: Subscription[] = [];

  permissions = permissionValues;

  readonly reportStatus = ReportStatus;

  constructor(
    private dialog: MatDialog,
    private snackBar: MatSnackBar,
    private popover: PopOverService,
    private searchService: SearchService,
    private globalSearch: LnxSearchService,
    private cdr: ChangeDetectorRef,
    private columnDefinitions: ColumnDefinitionsService,
    @Inject(ACL_ROUTES) public ACL: AclRoutesInterface
  ) {}

  ngOnInit() {
    this.displayedColumns = this.columnDefinitions.resultsColumns();
    this.dataSource = new ReportsDataSource(this.searchService);
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

  ngAfterViewChecked() {
    this.cdr.detectChanges();
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

    if (this.subs) {
      this.subs.forEach(subscription => {
        if (subscription) {
          subscription.unsubscribe();
        }
      });
    }

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

  openFilters() {
    const dialogRef = this.dialog.open(FiltersDialogComponent, {
      position: { top: '100px' },
      width: '800px',
    });
    dialogRef.afterClosed().subscribe(result => {});
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
        offsetLeft: popoverPosition.offsetLeft,
      },
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

  showMessage(message: string) {
    this.snackBar.open(message, null, {
      duration: 2000,
      horizontalPosition: 'right',
      verticalPosition: 'bottom',
    });
  }

  onWatchChange(report) {
    if (report.watcher) {
      this.removeAlertDialog(report);
    } else {
      this.startWatchReport(report);
    }
  }

  stopWatchReport(report) {
    if (report.watcher) {
      this.subs.push(
        this.searchService.stopWatch(report.record_id).subscribe(data => {
          if (data.data.stopWatch) {
            report.watcher = !report.watcher;
            this.showMessage('The individual was removed from the monitoring list.');
          }
        })
      );
    }
  }

  startWatchReport(report) {
    if (!report.watcher) {
      this.subs.push(
        this.searchService.startWatch(report.record_id).subscribe(data => {
          if (data.data.startWatch) {
            report.watcher = !report.watcher;
            this.showMessage('Individual added to the monitoring list.');
          }
        })
      );
    }
  }

  runReport(event: {report: any, type: ReportType}) {
    this.subs.push(
      this.searchService
        .runReport({
          SubjectId: event.report.unique_id,
          Lexid: Number(event.report.lexid),
          LastName: event.report.name_last
        },
          event.type
        )
        .subscribe(data => {
          if (data.data.runReport.status) {
            this.showMessage('A new report is being processed.');
          } else {
            this.showMessage(data.data.runReport.description);
          }
        })
    );
  }

  removeAlertDialog(report): void {
    const dialogRef = this.dialog.open(RemoveAlertDialogComponent, {
      width: '450px',
      data: {},
    });

    dialogRef.afterClosed().subscribe(result => {
      if (result) {
        this.stopWatchReport(report);
      }
    });
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
      this.dataSource.fetch({ filters: this.globalSearch.lastSearch() }, 'search');
      this.cdr.detectChanges();
  }

  sortingChanged($event) {
      this.dataSource.fetch({ filters: this.globalSearch.lastSearch() }, 'search');
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
