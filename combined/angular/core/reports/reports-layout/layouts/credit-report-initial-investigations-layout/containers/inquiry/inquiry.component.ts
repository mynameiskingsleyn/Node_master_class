import { Component, Inject, Optional } from '@angular/core';
import { DateFormatsConfig, DATE_FORMATS_CONFIG } from '@app/config/locale.config';
import { LayoutElementComponent } from '@app/core/reports/reports-layout/components/layout-element/layout-element.component';
import { CreditReport } from '@app/shared/models/reports/credit-report.model';

@Component({
  selector: 'app-inquiry',
  templateUrl: './inquiry.component.html',
  styleUrls: ['./inquiry.component.sass']
})
export class InquiryComponent extends LayoutElementComponent<CreditReport> {

  constructor(
    @Optional() @Inject(DATE_FORMATS_CONFIG) public dateFormats: DateFormatsConfig
  ) {
    super();
  }

}
