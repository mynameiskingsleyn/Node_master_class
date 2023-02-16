import { Component, Inject, OnInit, Optional } from '@angular/core';
import { DateFormatsConfig, DATE_FORMATS_CONFIG } from '@app/config/locale.config';
import { LayoutElementComponent } from '@app/core/reports/reports-layout/components/layout-element/layout-element.component';
import { ReportStatus } from '@app/core/utils/reports/report-status.enum';
import { CreditReport } from '@app/shared/models/reports/credit-report.model';
import { AclService } from '@app/shared/services/acl/acl.service';

@Component({
  selector: 'app-individual-information',
  templateUrl: './individual-information.component.html',
  styleUrls: ['./individual-information.component.sass']
})
export class IndividualInformationComponent extends LayoutElementComponent<CreditReport> {

  constructor(
      protected aclService: AclService,
      @Optional() @Inject(DATE_FORMATS_CONFIG) public dateFormats: DateFormatsConfig
  ) {
    super();
  }

  showSmallNoRecordReport() {
    if (this.data && this.data.ReportStatus && this.data.ReportStatus === ReportStatus.NO_RECORD) {
      return this.aclService.noRecordReportSmall();
    }
    return false;
  }

  toggleExpand() {
  }

}
