import { Component, Inject, Input, Optional } from '@angular/core';
import { DateFormatsConfig, DATE_FORMATS_CONFIG } from '@app/config/locale.config';
import { AclService } from '@app/shared/services/acl/acl.service';
import { LayoutElementComponent } from '../../components/layout-element/layout-element.component';

@Component({
  selector: 'app-credit-report-initial-investigations-layout',
  templateUrl: './credit-report-initial-investigations-layout.component.html',
  styleUrls: ['./credit-report-initial-investigations-layout.component.sass']
})
export class CreditReportInitialInvestigationsLayoutComponent extends LayoutElementComponent<any> {

  @Input() report: any;

  constructor(
    protected aclService: AclService,
    @Optional() @Inject(DATE_FORMATS_CONFIG) public dateFormats: DateFormatsConfig
  ) {
    super();
  }

}

