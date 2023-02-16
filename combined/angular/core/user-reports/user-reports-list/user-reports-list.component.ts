import { AfterViewInit, ChangeDetectionStrategy, Component, Inject, Input,
  OnChanges, OnDestroy, OnInit, QueryList, SimpleChanges, ViewChild, ViewChildren, ViewContainerRef } from '@angular/core';
import { MatPaginator, PageEvent } from '@angular/material/paginator';
import { MatSort } from '@angular/material/sort';
import { MatDialog } from '@angular/material/dialog';
import { MatTable } from '@angular/material/table';
import { MatSnackBar } from '@angular/material/snack-bar';
import { trigger, state, style, transition, animate } from '@angular/animations';
import { PopOverService } from '@app/shared/services/popover.service';
import { SubjectInfoComponent } from '@app/shared/components/subject-info/subject-info.component';
import { Report } from '@app/core/reports/models/report.model';
import { SearchService } from '@app/core/initial-investigation-search/services/search.service';
import { ExportService } from '@app/shared/services/export.service';
import { Subscription } from 'rxjs';
import { ReportType } from '@app/core/utils/reports/report-type.enum';
import { ACL_ROUTES } from '@app/shared/services/acl/config/acl-routes';
import { AclRoutesInterface } from '@app/shared/services/acl/config/acl-routes.interface';
import { ColumnDefinitionsService } from '@app/shared/services/column-definitions.service';
import { PERMISSIONS_VALUES as permissionValues } from '@app/shared/services/acl/config/acl-roles-permissions';
import { ReportsDataSource } from '@app/core/reports/reports-datasource';
import { ReportService } from '@app/core/reports/services/report.service';
import { NoRecordDialogComponent } from '@app/shared/components/no-record-dialog/no-record-dialog.component';
import { AddNoteDialogComponent } from '@app/shared/components/add-note-dialog/add-note-dialog.component';
import { ViewNotesDialogComponent } from '@app/shared/components/view-notes-dialog/view-notes-dialog.component';
import { AvailableReportsDialogComponent } from '@app/core/initial-investigation-search/components/dialogs/available-reports-dialog/available-reports-dialog.component';
// Enums and constants
import { ReportFormat } from '@app/core/utils/reports/report-format.enum';
// Router
import { Router } from '@angular/router';



@Component({
  selector: 'app-user-reports-list',
  templateUrl: './user-reports-list.component.html',
  styleUrls: ['./user-reports-list.component.sass'],
  animations: [
    trigger('detailExpand', [
      state('collapsed', style({height: '0px', minHeight: '0'})),
      state('expanded', style({height: '*'})),
      transition('expanded <=> collapsed', animate('225ms cubic-bezier(0.4, 0.0, 0.2, 1)')),
    ]),
  ],
  changeDetection: ChangeDetectionStrategy.OnPush
})
export class UserReportsListComponent implements OnInit, AfterViewInit, OnDestroy, OnChanges {

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
  dataSourceResults: Report[];

  prQuery = ReportFormat.PUBLIC_RECORD_EXP;
  prFormat: string;
  exportingPdf = false;

  @Input() results: any[];

  dataSource: ReportsDataSource;

  expandedElement: null;

  subs: Subscription[] = [];


  /** Columns displayed in the table. Columns IDs can be added, removed, or reordered. */
  displayedColumns: string[];

  permissions = permissionValues;

  constructor(
    private dialog: MatDialog,
    private popover: PopOverService,
    private snackbar: MatSnackBar,
    private reportsService: ReportService,
    private searchService: SearchService,
    private columnDefinitions: ColumnDefinitionsService,
    protected exportService: ExportService,
    @Inject(ACL_ROUTES) public ACL: AclRoutesInterface,
    private router: Router
  ) { }

  ngOnInit() {
    this.displayedColumns = this.columnDefinitions.alertsColumns();
    this.dataSource = new ReportsDataSource(this.reportsService);
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

  reportView(reportType, element) {
    const token = JSON.stringify({
                    id: element.unique_id,
                    type: reportType,
                    historyId: null,
                    prQuery: ReportFormat.PUBLIC_RECORD_EXP
                  });
    return this.ACL.REPORTS.replace('/(.*)', '') + '/' + reportType + '/' + btoa(token);
  }

  runReport(event: {report: any, type: ReportType}) {
    this.subs.push(
      this.searchService.runReport({
            SubjectId: event.report.unique_id,
            Lexid: Number(event.report.lexid),
            LastName: event.report.name_last
        },
            event.type
        ).subscribe(data => {
          if (data.data.runReport.status) {
            this.availableDialog(data.data.runReport);

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
      this.dataSource.fetch($event, 'reports');
  }

  sortingChanged($event) {
      this.dataSource.fetch($event, 'reports');
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
