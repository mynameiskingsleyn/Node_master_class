import { Component, Inject, OnInit, Optional } from '@angular/core';
import { DateFormatsConfig, DATE_FORMATS_CONFIG } from '@app/config/locale.config';
import { LayoutElementComponent } from '@app/core/reports/reports-layout/components/layout-element/layout-element.component';
import { IndividualInformation } from '@app/shared/models/reports/individual-information.model';
import { AclService } from '@app/shared/services/acl/acl.service';

@Component({
  selector: 'app-echo-header',
  templateUrl: './echo-header.component.html',
  styleUrls: ['./echo-header.component.sass']
})
export class EchoHeaderComponent extends LayoutElementComponent<IndividualInformation> implements OnInit {

  hideAgencyNotes = false;

  constructor(
    protected aclService: AclService,
    @Optional() @Inject(DATE_FORMATS_CONFIG) public dateFormats: DateFormatsConfig
  ) {
    super();
  }

  ngOnInit() {
    this.hideAgencyNotes = this.aclService.agencyNotesDisabled();
  }

}
