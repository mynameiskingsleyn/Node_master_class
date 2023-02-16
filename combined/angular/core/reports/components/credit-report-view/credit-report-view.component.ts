import { Component, OnInit, Input } from '@angular/core';
import { ReportStatus } from '@app/core/utils/reports/report-status.enum';
import { AclService } from '@app/shared/services/acl/acl.service';

@Component({
  selector: 'app-credit-report-view',
  templateUrl: './credit-report-view.component.html',
  styleUrls: ['./credit-report-view.component.sass']
})
export class CreditReportViewComponent implements OnInit {

  @Input() report: any;
  @Input() creditReport: any;
  @Input() loading = true;
  @Input() printable = false;
  @Input() expanded = false;

  dateFormat = 'MM/dd/yyyy';
  shortDateFormat = 'MM/yy';
  shortFormat  = 'MM/YY'; // moment js format
  longFormat = 'MM/DD/YYYY';
  hideAgencyNotes = false;

  constructor(protected aclService: AclService) { }

  ngOnInit() {
    this.hideAgencyNotes = this.aclService.agencyNotesDisabled();
  }

  showSmallNoRecordReport() {
    if (this.creditReport && this.creditReport.ReportStatus && this.creditReport.ReportStatus === ReportStatus.NO_RECORD) {
      return this.aclService.noRecordReportSmall();
    }
    return false;
  }

  toggleExpand() {
  }

}
