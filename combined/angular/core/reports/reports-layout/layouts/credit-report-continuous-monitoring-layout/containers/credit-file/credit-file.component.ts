import { Component, Inject, Input, Optional } from '@angular/core';
import { DateFormatsConfig, DATE_FORMATS_CONFIG } from '@app/config/locale.config';
import { LayoutElementComponent } from '@app/core/reports/reports-layout/components/layout-element/layout-element.component';
import { CreditReport } from '@app/shared/models/reports/credit-report.model';
import { CreditFile } from '@app/shared/models/reports/credit/credit-file.model';

@Component({
  selector: 'app-credit-file',
  templateUrl: './credit-file.component.html',
  styleUrls: ['./credit-file.component.sass']
})
export class CreditFileComponent extends LayoutElementComponent<CreditFile> {

  @Input() report: CreditReport;

  constructor(
    @Optional() @Inject(DATE_FORMATS_CONFIG) public dateFormats: DateFormatsConfig
  ) {
    super();
  }

}
