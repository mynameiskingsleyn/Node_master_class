import { Component, OnInit } from '@angular/core';
import { LayoutComponent } from '../layout/layout.component';

@Component({
  selector: 'app-main-layout',
  templateUrl: './main-layout.component.html',
})
export class MainLayoutComponent extends LayoutComponent implements OnInit {

  public openSidenav = false;

  ngOnInit() {
    super.ngOnInit();
    this.openSidenav = this.aclService.acceptedPermittedUses();
  }

}
