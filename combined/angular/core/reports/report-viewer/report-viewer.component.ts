import { Component, OnInit, OnDestroy, ViewChild, AfterViewInit, ChangeDetectorRef } from '@angular/core';
import { ReportService } from '../services/report.service';
import { Subscription } from 'rxjs';
import { map } from 'rxjs/operators';
import { ActivatedRoute, ParamMap } from '@angular/router';
import { switchMap } from 'rxjs/operators';
import { MatAccordion } from '@angular/material/expansion';
import { ComponentPortal, Portal } from '@angular/cdk/portal';
import { PublicRecordViewComponent } from '../components/public-record-view/public-record-view.component';
import { PublicRecordExpViewComponent } from '../components/public-record-exp-view/public-record-exp-view.component';
import { CreditReportViewComponent } from '../components/credit-report-view/credit-report-view.component';
import { ReportType } from '@app/core/utils/reports/report-type.enum';
import { ReportFormat } from '@app/core/utils/reports/report-format.enum';
import { ExportService } from '@app/shared/services/export.service';
import { Location } from '@angular/common';
import { NonFcraPublicRecordsViewComponent } from '../components/non-fcra-public-records-view/non-fcra-public-records-view.component';
import { PERMISSIONS_VALUES as permissionValues } from '@app/shared/services/acl/config/acl-roles-permissions';
import { AppEventsService } from '@app/shared/services/app-events/app-events.service';
// eslint-disable-next-line max-len
import { CreditReportContinuousMonitoringLayoutComponent } from '../reports-layout/layouts/credit-report-continuous-monitoring-layout/credit-report-continuous-monitoring-layout.component';
// eslint-disable-next-line max-len
import { CreditReportInitialInvestigationsLayoutComponent } from '../reports-layout/layouts/credit-report-initial-investigations-layout/credit-report-initial-investigations-layout.component';
import { AclService } from '@app/shared/services/acl/acl.service';
import { NonFCRADisclaimerComponent } from '../components/non-fcradisclaimer/non-fcradisclaimer.component';

@Component({
  selector: 'app-report-viewer',
  templateUrl: './report-viewer.component.html',
  styleUrls: ['./report-viewer.component.sass']
})
export class ReportViewerComponent implements OnInit, OnDestroy {

  @ViewChild(MatAccordion, { static: false }) accordion !: MatAccordion;

  type: string;
  uniqueId: string;
  historyId: string;
  reportDate: string;
  prQuery = ReportFormat.PUBLIC_RECORD_LEGACY;
  lexid: string;

  report$: Subscription = new Subscription();
  report: any = {};
  creditReport: any;
  loading: boolean;
  exportingPdf = false;
  reportType = '';
  expanded = true;

  reportViews: Portal<any>[];
  reportViewerRef: any[] = [];
  prFormat: string;

  permissions = permissionValues;

  constructor(
      private route: ActivatedRoute,
      private reportService: ReportService,
      private exportService: ExportService,
      private location: Location,
      private eventService: AppEventsService,
      private aclService: AclService,
      private cdr: ChangeDetectorRef,
    ) {}

  ngOnInit() {
      this.loading = true;

      if (!this.type && !this.uniqueId) {
        this.report$.add(
          this.route.paramMap.pipe(
            switchMap((params: ParamMap) => {
              const reportParams = this.getReportParams(params);
              this.type = reportParams.type;
              this.uniqueId = reportParams.id;
              this.historyId = reportParams.historyId;
              this.prQuery = reportParams.prQuery ? reportParams.prQuery : this.prQuery;
              this.prFormat = reportParams.prFormat ? reportParams.prFormat : this.prQuery;
              this.reportViews = this.createReportViews(this.type);
              return this.getReport(
                reportParams.type,
                reportParams.id,
                reportParams.historyId,
                reportParams.prQuery
              );
            })
          ).subscribe()
        );
      } else {
        this.reportViews = this.createReportViews(this.type);
        this.report$.add(
          this.getReport(
            this.type,
            this.uniqueId,
            this.historyId,
            this.prQuery
          ).subscribe()
        );
      }
      this.report$.add(
        this.eventService.errorOccurred$.subscribe(() => {
          this.loading = false;
          this.exportingPdf = false;
          this.report.Error = true;
        })
      );
  }

  ngOnDestroy(): void {
    this.report$.unsubscribe();
  }

  createReportViews(type: string = '') {
    const views: Portal<any>[] = [];
    switch (type.toLowerCase()) {
      case ReportType.PUBLIC_RECORD:
        if (this.aclService.hasPrEnabled()) {
          if (this.prFormat && this.prFormat === ReportFormat.PUBLIC_RECORD_EXP) {
            views.push(new ComponentPortal(PublicRecordExpViewComponent));
          } else {
            views.push(new ComponentPortal(PublicRecordViewComponent));
          }

        }
        break;
      case ReportType.CREDIT_REPORT:
        if (this.aclService.hasCrEnabled()) {
          if (this.aclService.hasMonitoringEnabled()) {
            views.push(new ComponentPortal(CreditReportContinuousMonitoringLayoutComponent));
          } else {
            views.push(new ComponentPortal(CreditReportInitialInvestigationsLayoutComponent));
          }
        }
        break;
      case ReportType.NONFCRA_REPORT:
        if (this.aclService.hasNrEnabled()) {
          views.push(new ComponentPortal(NonFcraPublicRecordsViewComponent));
        }
        break;
      default:
        if (this.aclService.hasCombinedEnabled()) {
          if (this.aclService.hasPrEnabled()) {
            if (this.prFormat && this.prFormat === ReportFormat.PUBLIC_RECORD_EXP) {
              views.push(new ComponentPortal(PublicRecordExpViewComponent));
            } else {
              views.push(new ComponentPortal(PublicRecordViewComponent));
            }
          }
          if (this.aclService.hasCrEnabled()) {
            if (this.aclService.hasMonitoringEnabled()) {
              views.push(new ComponentPortal(CreditReportContinuousMonitoringLayoutComponent));
            } else {
              views.push(new ComponentPortal(CreditReportInitialInvestigationsLayoutComponent));
            }
          }
          if (this.aclService.hasNrEnabled()) {
            views.push(new ComponentPortal(NonFCRADisclaimerComponent));
            views.push(new ComponentPortal(NonFcraPublicRecordsViewComponent));
          }
        }
        break;
    }
    return views;
  }

  receiveReference(componentRef) {
    this.reportViewerRef.push((componentRef as any).instance);
  }

  toggleExpand() {
    this.expanded = !this.expanded;
    this.expanded ? this.accordion.closeAll() : this.accordion.openAll();
  }

  getReportParams(params) {
    const tokenParam = params.get('id');
    let parsedParams: any = {};

    if (tokenParam) {
      parsedParams = JSON.parse(atob(params.get('id')));
    }

    return {
      type: parsedParams.type || null,
      id: parsedParams.id || null,
      historyId: parsedParams.historyId || null,
      prQuery: parsedParams.prQuery || null,
      prFormat: parsedParams.prFormat || null
    };
  }

  exportToPdf() {
    this.exportingPdf = true;
    this.report$.add(
      this.exportService.exportToPdf({
        reportType: this.type.toUpperCase(),
        uniqueId: this.uniqueId,
        lexid: Number(this.lexid),
        reportDate: this.reportDate,
        historyId: Number(this.historyId),
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

  private getReport(type: string, id: string, historyId: string = '', prQuery: string = '') {
    this.reportType = ( type || ReportType.COMPLETE_REPORT ).toLowerCase();
    return this.reportService.load(this.reportType, id, historyId, prQuery).pipe(
      map((report: any) => {
        this.loading = false;
        if (report) {
          this.report = report;
          this.lexid = report.SubjectEcho.Lexid;
          this.reportDate = report.ReportDate;
          this.prFormat = report.prFormat;
        }
        if (this.prQuery !== this.prFormat) {
          this.reportViews = this.createReportViews(this.type);
          this.cdr.detectChanges();
        }
        if (this.reportViewerRef) {
            this.reportViewerRef.forEach(reportRef => {
              this.mapReportToView(type, this.report, reportRef);
              reportRef.loading = this.loading;
            });
        }
      })
    );
  }

  private mapReportToView(type, report, reportRef) {

    if (type === ReportType.COMPLETE_REPORT) {
      if (reportRef instanceof PublicRecordViewComponent || reportRef instanceof PublicRecordExpViewComponent) {
        reportRef.report = report.PublicRecordReport;
      }

      if (reportRef instanceof CreditReportContinuousMonitoringLayoutComponent ||
          reportRef instanceof CreditReportInitialInvestigationsLayoutComponent
        ) {
        reportRef.report = report.CreditReport;
      }

      if (reportRef instanceof NonFcraPublicRecordsViewComponent) {
        reportRef.report = report.PublicRecordNonFCRAReport;
      }
    } else {
      reportRef.report = report;
    }
  }

  goBack() {
    this.location.back();
  }
}
