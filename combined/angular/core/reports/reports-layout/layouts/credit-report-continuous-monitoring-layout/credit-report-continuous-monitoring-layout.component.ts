import { Component, Inject, Input, OnInit, Optional } from '@angular/core';
import { DateFormatsConfig, DATE_FORMATS_CONFIG } from '@app/config/locale.config';
import { ReportStatus } from '@app/core/utils/reports/report-status.enum';
import { AclService } from '@app/shared/services/acl/acl.service';
import { LayoutElementComponent } from '../../components/layout-element/layout-element.component';

@Component({
  selector: 'app-credit-report-continuous-monitoring-layout',
  templateUrl: './credit-report-continuous-monitoring-layout.component.html',
  styleUrls: ['./credit-report-continuous-monitoring-layout.component.sass']
})
export class CreditReportContinuousMonitoringLayoutComponent extends LayoutElementComponent<any> {

  @Input() report: any;

  constructor(
    protected aclService: AclService,
    @Optional() @Inject(DATE_FORMATS_CONFIG) public dateFormats: DateFormatsConfig
  ) {
    super();
  }

  showSmallNoRecordReport() {
    if (this.report && this.report.ReportStatus && this.report.ReportStatus === ReportStatus.NO_RECORD) {
      return this.aclService.noRecordReportSmall();
    }
    return false;
  }

}
