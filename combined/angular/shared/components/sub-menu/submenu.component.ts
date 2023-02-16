import { Component, Input, Output, EventEmitter, OnInit } from '@angular/core';
import { Report } from '@app/shared/interfaces/report.interface';
import { ReportType } from '@app/core/utils/reports/report-type.enum';
import { PERMISSIONS_VALUES as permissionsValue } from '@app/shared/services/acl/config/acl-roles-permissions';
import { AclService } from '@app/shared/services/acl/acl.service';

@Component({
  selector: 'app-submenu',
  templateUrl: './submenu.component.html',
  styleUrls: ['./submenu.component.scss']
})
export class SubmenuComponent implements OnInit {

  @Input() report: any;
  @Output() watch: EventEmitter<any> = new EventEmitter();
  @Output() run: EventEmitter<any> = new EventEmitter();
  @Output() note: EventEmitter<any> = new EventEmitter();
  @Output() view: EventEmitter<any> = new EventEmitter();
  @Output() download: EventEmitter<any> = new EventEmitter();
  @Output() incorrect: EventEmitter<any> = new EventEmitter();


  PublicRecord = ReportType.PUBLIC_RECORD;
  CreditReport = ReportType.CREDIT_REPORT;
  NonFCRAPublicRecord = ReportType.NONFCRA_REPORT;
  CombinedReport = ReportType.COMPLETE_REPORT;
  canTriggerPrRecord = false;
  showAgencyNotes = false;

  permissions = permissionsValue;

  constructor(private aclService: AclService) { }

  ngOnInit() {
    this.showAgencyNotes = !this.aclService.agencyNotesDisabled();
    this.canTriggerPrRecord = this.aclService.hasPrEnabled() &&
                              !this.aclService.hasMonitoringEnabled() &&
                              String(this.report.lexid) !== '-1';
  }

  runReport(report: Report, type: ReportType) {
    this.run.emit({report, type});
  }


  toggleWatch(report) {
    this.watch.emit(report);
  }

  addNote(report, type) {
    this.note.emit({report, type});
  }

  downloadReportPdf(report,type){
    this.download.emit({report, type});
  }

  viewNotes(report) {
    this.view.emit(report);
  }

  incorrectlyEntered(report) {
    this.incorrect.emit(report);
  }

}
