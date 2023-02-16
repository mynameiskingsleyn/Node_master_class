import { Component, OnInit, Input } from '@angular/core';
import { MatSidenav } from '@angular/material/sidenav';
import { environment } from 'environments/environment';
import { AclService } from '@app/shared/services/acl/acl.service';

@Component({
  selector: 'app-main-header',
  templateUrl: './main-header.component.html',
})
export class MainHeaderComponent implements OnInit {

  app = environment.app;

  @Input() sidenav: MatSidenav;
  sidenavOpened: boolean;

  onToggleSidenav() {
    this.sidenav.toggle();
    this.sidenavOpened = this.sidenav.opened;
  }

  constructor(
    private aclService: AclService
  ) { }

  ngOnInit() {
    if (this.sidenav) {
        this.sidenavOpened = this.sidenav.opened;
    }
  }

}
