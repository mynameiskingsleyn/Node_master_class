import { Component, OnInit } from '@angular/core';
import { LayoutElementComponent } from '@app/core/reports/reports-layout/components/layout-element/layout-element.component';
import { IndividualInformation } from '@app/shared/models/reports/individual-information.model';
import { AclService } from '@app/shared/services/acl/acl.service';

@Component({
  selector: 'app-echo-header',
  templateUrl: './echo-header.component.html',
  styleUrls: ['./echo-header.component.sass']
})
export class EchoHeaderComponent extends LayoutElementComponent<IndividualInformation> {

}
