import { Component, OnInit, Inject } from '@angular/core';
import { MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { APP_CONFIG, IAppConfig } from '@app/config/app.config';
import { AccountService } from '@app/shared/services/account.service';
import { ProductModuleCodes } from '@app/shared/enums/product-module-codes.enum';
import { ACL_ROUTES } from '@app/shared/services/acl/config/acl-routes';
import { AclRoutesInterface } from '@app/shared/services/acl/config/acl-routes.interface';
import { AclService } from '@app/shared/services/acl/acl.service';
import { ReportType } from '@app/core/utils/reports/report-type.enum';
import { ReportFormat } from '@app/core/utils/reports/report-format.enum';
import { ReportStatus } from '@app/core/utils/reports/report-status.enum';
import { AvailableReportData, AvailableReportElement } from '@app/core/utils/interfaces/available-report-data.interface';

@Component({
  selector: 'app-available-reports-dialog',
  templateUrl: './available-reports-dialog.component.html',
  styleUrls: ['./available-reports-dialog.component.sass']
})
export class AvailableReportsDialogComponent implements OnInit {

  showEnrollMsg = true;
  element = null;
  col = 33;
  displayCount = 0;
  available: AvailableReportElement[] = [];
  reportDate = null;
  selectedType = null;
  subject = null;
  lexId = null;
  uniqueId = null;
  prFormat = ReportFormat.PUBLIC_RECORD_EXP;
  readonly reportStatus = ReportStatus;

  constructor(
    public aclService: AclService,
    private accountService: AccountService,
    @Inject(APP_CONFIG) public config: IAppConfig,
    public dialogRef: MatDialogRef<AvailableReportsDialogComponent>,
    @Inject(MAT_DIALOG_DATA) public data: AvailableReportData,
    @Inject(ACL_ROUTES) public ACL: AclRoutesInterface
  ) { }

  ngOnInit() {
    this.init();
  }

  setSelected(elem: AvailableReportElement): void {
    if (elem.status === ReportStatus.COMPLETE) {
      this.selectedType = elem.type;
    }

  }

  confirmToView(code) {
    const link = this.reportView(this.selectedType);
    const toView = {code: code, link: link };
    this.dialogRef.close(toView);
  }

  confirmToDownLoad(code) {
    const obj = this.available.find(obj => obj.type === this.selectedType);
    let element = { lexId: this.lexId, unique_id: null };

    if(this.subject){
      element = { lexId: this.subject.Lexid, unique_id: this.subject.SubjectId }
    }

    const toDownload = { element: element, selected: obj, code: code }
    this.dialogRef.close(toDownload);
  }

  closeDialog() {
    this.dialogRef.close(true);
  }

  private init() {
    this.subject = this.data.subject;
    this.showEnrollMsg = false;

    if (this.data.result) {
      this.element = this.data.result;
      if (this.element && this.element.PublicRecordReportFormat) {
        this.prFormat = this.element.PublicRecordReportFormat;
      }
    }
    if (this.element !== null) {
      this.addPR();
      this.addCR();
      this.addNR();
    }
    const len = this.available.length;
    if (len > 0) {
      this.col = 100/len;
    }

  }

  addPR(): void {
    if (this.aclService.hasPrEnabled() && this.element.PublicRecordReportStatus !== null ) {
      this.reportDate = this.element.ReportDate;
      let status = this.element.PublicRecordReportStatus;
      let date = null;
      const reportId = this.subject.SubjectId;
      if(this.element.PublicRecordReport && this.element.PublicRecordReport !== null){
        date = this.element.PublicRecordReport.ReportDate;
        status = this.element.PublicRecordReport.ReportStatus;
        if (this.lexId === null && this.element.PublicRecordReport.InputRecord !== null) {
            this.lexId = this.element.PublicRecordReport.InputRecord.LexID ? this.element.PublicRecordReport.InputRecord.LexID : null;
        }
      } else {
        date = this.element.PublicRecordReportDate ? this.element.PublicRecordReportDate : null;
        this.lexId = this.subject.Lexid ? this.subject.Lexid : null;
      }
      const pr: AvailableReportElement = {
                name: "Public Record", type: ReportType.PUBLIC_RECORD,
                status: status,
                date: date,
                report_id: reportId
              };
      if(status !== null && this.hasData(pr)){
          this.available.push(pr);
      }
    }
  }

  addCR(): void {
    if (this.aclService.hasCrEnabled() && this.element.CreditReportData !== null ) {
      let status = null;
      let date = null;
      const reportId = this.subject.SubjectId;
      if (this.element.CreditReportData !== null) {
        status = this.element.CreditReportData.ReportStatus;
        date = this.element.CreditReportData.ReportDate;
      }
      if(this.reportDate === null && date !== null){
        this.reportDate = date;
      }
      const cr: AvailableReportElement = {
                  name: "Credit Report", type: ReportType.CREDIT_REPORT,
                  status: status,
                  date: date,
                  report_id: reportId
               };
      if(status !== null && this.hasData(cr)){
        this.available.push(cr);
      }
    }
  }
  addNR(): void {
    if(this.aclService.hasNrEnabled() &&  this.element.PublicRecordNonFCRAReportStatus !== null){
      let status = this.element.PublicRecordNonFCRAReportStatus;
      let date = null;
      const reportId = this.subject.SubjectId;
      if (this.element.PublicRecordNonFCRAReport !== null) {
        date = this.element.PublicRecordNonFCRAReport.ReportDate;
      }

      const nr: AvailableReportElement = {
                name: "NoneFCRA Public Record", type: ReportType.NONFCRA_REPORT,
                status: status,
                date: date,
                report_id: reportId
                };
      if(status !== null && this.hasData(nr)){
        this.available.push(nr);
      }
    }
  }

  hasData(el){
    return(el.status !== ReportStatus.NO_RECORD && el.date !== null );
  }

  reportView(reportType) {
    const obj = this.available.find(obj => obj.type === reportType);
    const token = JSON.stringify({
                    id: obj.report_id ? obj.report_id: null,
                    type: reportType,
                    historyId: null,
                    prQuery: ReportFormat.PUBLIC_RECORD_EXP,
                    prFormat: this.prFormat
                  });
    return this.ACL.REPORTS.replace('/(.*)', '') + '/' + reportType + '/' + btoa(token);
  }
}
