import { Component } from '@angular/core';
import { environment } from 'environments/environment';
import { AclService } from '@app/shared/services/acl/acl.service';

@Component({
  selector: 'app-main-footer',
  templateUrl: './main-footer.component.html',
})
export class MainFooterComponent {

  app = environment.app;
  today: number = Date.now();

  constructor(
    private aclService: AclService
  ) { }
  
}
