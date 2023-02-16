import { ComponentPortal, Portal } from '@angular/cdk/portal';
import { Component, Input, OnDestroy, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
// eslint-disable-next-line max-len
import { NonFcraPublicRecordsViewComponent } from '@app/core/reports/components/non-fcra-public-records-view/non-fcra-public-records-view.component';
import { NonFCRADisclaimerComponent } from '@app/core/reports/components/non-fcradisclaimer/non-fcradisclaimer.component';
import { PublicRecordViewComponent } from '@app/core/reports/components/public-record-view/public-record-view.component';
import { PublicRecordExpViewComponent } from '@app/core/reports/components/public-record-exp-view/public-record-exp-view.component';
// eslint-disable-next-line max-len
import { CreditReportContinuousMonitoringLayoutComponent } from '@app/core/reports/reports-layout/layouts/credit-report-continuous-monitoring-layout/credit-report-continuous-monitoring-layout.component';
// eslint-disable-next-line max-len
import { CreditReportInitialInvestigationsLayoutComponent } from '@app/core/reports/reports-layout/layouts/credit-report-initial-investigations-layout/credit-report-initial-investigations-layout.component';
import { ReportService } from '@app/core/reports/services/report.service';
import { ReportType } from '@app/core/utils/reports/report-type.enum';
import { ReportFormat } from '@app/core/utils/reports/report-format.enum';
import { AclService } from '@app/shared/services/acl/acl.service';
import { Subscription } from 'rxjs';

@Component({
  selector: 'app-report-export-view',
  templateUrl: './report-export-view.component.html',
  styleUrls: ['./report-export-view.component.sass']
})
export class ReportExportViewComponent implements OnInit, OnDestroy {

  @Input() showHeader = true;

  report$: Subscription;
  report: any;
  creditReport: any;
  type: string;
  uniqueId: string;
  historyId: string;
  prQuery: string;
  prFormat: string;
  loading = true;

  reportViews: Portal<any>[];
  reportViewerRef: any[] = [];

  constructor(
      private route: ActivatedRoute,
      private reportService: ReportService,
      private aclService: AclService) {}

  ngOnInit() {
    this.getReportParameters();
    this.reportViews = this.createReportViews(this.type);
    this.getReport();
  }

  ngOnDestroy() {
    if (this.report$) {
      this.report$.unsubscribe();
    }
  }

  private getReportParameters() {
    this.type = sessionStorage.getItem('type');
    this.uniqueId = sessionStorage.getItem('uniqueId');
    this.historyId = sessionStorage.getItem('historyId') ? sessionStorage.getItem('historyId') : null;
    this.prQuery = sessionStorage.getItem('prQuery') ? sessionStorage.getItem('prQuery') : null;
    this.prFormat = sessionStorage.getItem('prFormat') ? sessionStorage.getItem('prFormat') : null;

    if (!this.type) {
      this.route.queryParams.subscribe(params => {
        this.type = params.type;
      });
    }
  }

  private getReport() {
    this.report$ = this.reportService.load(this.type, this.uniqueId, this.historyId, this.prQuery).subscribe(
      report => {
        this.loading = false;
        if (report) {
          this.report = report;
          if (this.reportViewerRef) {
            this.reportViewerRef.forEach(reportRef => {
                this.mapReportToView(this.type, this.report, reportRef);
                reportRef.loading = this.loading;
            });
          }
        }
      },
      error => {
        this.loading = false;
      }
    );
  }

  receiveReference(componentRef) {
    this.reportViewerRef.push((componentRef as any).instance);
    this.reportViewerRef.forEach(reportRef => {
      reportRef.loading = false;
      reportRef.printable = true;
      reportRef.expanded = true;
  });
  }

  createReportViews(type: string = '') {
    const views: Portal<any>[] = [];

    switch (type.toLowerCase()) {
      case ReportType.PUBLIC_RECORD:
        if (this.aclService.hasPrEnabled()) {
          if (this.prFormat === ReportFormat.PUBLIC_RECORD_EXP ) {
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
            if (this.prFormat === ReportFormat.PUBLIC_RECORD_EXP ) {
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

}
