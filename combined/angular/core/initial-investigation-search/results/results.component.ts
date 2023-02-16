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
import { Report } from '../../reports/models/report.model';
import { PopOverService } from '@app/shared/services/popover.service';
import { SubjectInfoComponent } from '@app/shared/components/subject-info/subject-info.component';
// dialogs
import { RemoveAlertDialogComponent } from '../components/dialogs/remove-alert-dialog/remove-alert-dialog.component';
import { ConfirmIncorrectDialogComponent } from '../components/dialogs/confirm-incorrect-dialog/confirm-incorrect-dialog.component';
import { TriggerNonFCRADialogComponent } from '../components/dialogs/trigger-non-fcradialog/trigger-non-fcradialog.component';
import { NoRecordDialogComponent } from '@app/shared/components/no-record-dialog/no-record-dialog.component';
import { AddNoteDialogComponent } from '@app/shared/components/add-note-dialog/add-note-dialog.component';
import { ViewNotesDialogComponent } from '@app/shared/components/view-notes-dialog/view-notes-dialog.component';
import { AvailableReportsDialogComponent } from '@app/core/initial-investigation-search/components/dialogs/available-reports-dialog/available-reports-dialog.component';

import { ReportsDataSource } from '../../reports/reports-datasource';
import { Subscription } from 'rxjs';
import { ReportType } from '../../utils/reports/report-type.enum';
import { ReportFormat } from '../../utils/reports/report-format.enum';
import { ACL_ROUTES } from '@app/shared/services/acl/config/acl-routes';
import { AclRoutesInterface } from '@app/shared/services/acl/config/acl-routes.interface';
import { PERMISSIONS_VALUES as permissionValues } from '@app/shared/services/acl/config/acl-roles-permissions';
import { ColumnDefinitionsService } from '@app/shared/services/column-definitions.service';

import { ReportStatus } from '../../utils/reports/report-status.enum';
// Router
import { Router } from '@angular/router';
// services
import { ExportService } from '@app/shared/services/export.service';
import { LnxSearchService } from '@lnx/search';
import { SearchService } from '../services/search.service';


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

  prQuery = ReportFormat.PUBLIC_RECORD_EXP;
  prFormat: string;

  exportingPdf = false;

  readonly reportStatus = ReportStatus;

  constructor(
    private dialog: MatDialog,
    private snackBar: MatSnackBar,
    private popover: PopOverService,
    private searchService: SearchService,
    private globalSearch: LnxSearchService,
    private cdr: ChangeDetectorRef,
    private columnDefinitions: ColumnDefinitionsService,
    @Inject(ACL_ROUTES) public ACL: AclRoutesInterface,
    protected exportService: ExportService,
    private router: Router
  ) {}

  ngOnInit() {
    this.displayedColumns = this.columnDefinitions.reWriteResultsColumns();
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
                    historyId: null,
                    prQuery: ReportFormat.PUBLIC_RECORD_EXP
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

  incorrectlyEntered(report){
    const dialogRef = this.dialog.open(ConfirmIncorrectDialogComponent, {
      width: '550px',
      data: {},
    });
    dialogRef.afterClosed().subscribe( result => {
      if (result) {
        this.setAsIncorrect(report);
      }
    });

  }

  setAsIncorrect(report){
    const subjectInfo = {
      SubjectId: report.unique_id,
      Lexid: report.lexid,
      LastName: report.name_last
    };
    this.subs.push(
      this.searchService.markAsIncorrect(subjectInfo).subscribe( data => {
          if(data &&  data.data.removeSubject){
            this.showMessage('Record has been marked as incorrect.');
          }
      })
    );
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
            this.availableDialog(data.data.runReport);
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

  downloadReportPdf(report){
      this.dialog.closeAll();
      const elem = report.report;
      const dateKey = 'max_'+report.type+'_date';
      const reportDate = elem[dateKey];
      this.exportingPdf = true;
      this.subs.push(
        this.exportService.exportToPdf({
          reportType: report.type.toUpperCase(),
          uniqueId: elem.unique_id,
          lexid: Number(elem.lexid),
          reportDate: reportDate,
          historyId: Number(elem.historyId ? elem.historyId : null),
          prQuery: ReportFormat.PUBLIC_RECORD_EXP
        }).subscribe(result => {
          this.exportingPdf = false;
          if (result.data && result.data.exportReportPdf) {
            this.exportService.openPdfFile(result.data.exportReportPdf);
          }
        })
      );
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

  availableDialog(result): void {

      const subject = result.result;
      const res = result.InsiderReport;
      if (res.PublicRecordReportFormat) {
        this.prFormat = res.PublicRecordReportFormat;
      }
      const data = {
          subject: subject,
          result: res
        };
      const dialogRef = this.dialog.open(AvailableReportsDialogComponent, {
            width: '450px',
            data: data
        });

        dialogRef.afterClosed().subscribe(result => {
            if(result.code == 'view'){
              this.router.navigate([result.link]);
            }else if(result.code == 'download'){
              this.exportToPdf(result);
            }
          });
  }

  exportToPdf(result) {
    const elem = result.element;
    const selected = result.selected;
    this.exportingPdf = true;
    this.subs.push(
      this.exportService.exportToPdf({
        reportType: selected.type,
        uniqueId: elem.unique_id,
        lexid: Number(elem.lexId),
        reportDate: selected.date,
        historyId: Number(elem.historyId ? elem.historyId : null),
        prQuery: this.prQuery,
        prFormat: this.prFormat
      }).subscribe(result => {
        this.exportingPdf = false;
        if (result.data && result.data.exportReportPdf) {
          this.exportService.openPdfFile(result.data.exportReportPdf);
        }
      })
    );
  }
}
