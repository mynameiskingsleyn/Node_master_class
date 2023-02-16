import { Component, Inject, OnDestroy, OnInit } from '@angular/core';
import { MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { SearchService } from '@app/core/search/services/search.service';
import { ReportType } from '@app/core/utils/reports/report-type.enum';
import { Report } from '@app/shared/interfaces/report.interface';
import { ACL_ROUTES } from '@app/shared/services/acl/config/acl-routes';
import { AclRoutesInterface } from '@app/shared/services/acl/config/acl-routes.interface';
import { ExportService } from '@app/shared/services/export.service';
import { Subscription } from 'rxjs';

@Component({
  selector: 'app-no-record-dialog',
  templateUrl: './no-record-dialog.component.html',
  styleUrls: ['./no-record-dialog.component.sass']
})
export class NoRecordDialogComponent implements OnInit, OnDestroy {

  loading = false;
  downloading = false;
  message: string;
  subscription: Subscription = new Subscription();

  constructor(
    public dialogRef: MatDialogRef<NoRecordDialogComponent>,
    private searchService: SearchService,
    private exportService: ExportService,
    @Inject(MAT_DIALOG_DATA) public data: any,
    @Inject(ACL_ROUTES) public ACL: AclRoutesInterface) {}

  ngOnInit() {
    this.getReportStatus(this.data.report);
  }

  cancel(): void {
    this.dialogRef.close(false);
  }

  ok(): void {
    this.accept();
  }

  accept(): void {
      this.dialogRef.close(true);
  }

  viewReport() {
    const report = this.data.report;
    const token = JSON.stringify({
                    id: report.unique_id,
                    type: report.output_type.toLowerCase(),
                    historyId: report.report_id
                  });
    return this.ACL.REPORTS.replace('/(.*)', '') + '/' + report.output_type.toLowerCase() + '/' + btoa(token);
  }

  getReportStatus(historyReport: Report) {
    this.loading = true;
    this.subscription.add(
      this.searchService.getCreditReportStatus(historyReport).subscribe((result) => {
        if (result.data && result.data.getReport) {
            const report = result.data.getReport;
            const bureauName = report.CreditReportData.CreditReport.CreditBureau;
            this.loading = false;
            this.message = bureauName;
          }
      })
    );
  }

  downloadReportPdf() {
    this.downloading = true;
    const report = this.data.report;
    this.subscription.add(
      this.exportService.exportToPdf({
        reportType: report.output_type,
        uniqueId: report.unique_id,
        lexid: report.lexid,
        reportDate: report.date_returned,
        historyId: report.report_id
      }).subscribe(result => {
        this.downloading = false;
        if (result.data && result.data.exportReportPdf) {
          this.exportService.openPdfFile(result.data.exportReportPdf);
        }
      })
    );
  }

  ngOnDestroy() {
    this.subscription.unsubscribe();
  }

}
