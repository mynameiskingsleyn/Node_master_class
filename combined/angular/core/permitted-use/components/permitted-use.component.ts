import { Component, OnInit, Inject } from '@angular/core';
import { Router } from '@angular/router';
import { ACL_ROUTES } from '@app/shared/services/acl/config/acl-routes';
import { AclRoutesInterface } from '@app/shared/services/acl/config/acl-routes.interface';
import { AclService } from '@app/shared/services/acl/acl.service';
import { MatSnackBar } from '@angular/material/snack-bar';
import { PermittedUse } from '../permitted-use.enum';

@Component({
  selector: 'app-permitted-use',
  templateUrl: './permitted-use.component.html',
  styleUrls: ['./permitted-use.component.sass']
})
export class PermittedUseComponent implements OnInit {

  permittedUseFCRA = PermittedUse.FCRA;
  permittedUseNonFCRA = PermittedUse.NonFCRA;
  acceptedValue = 'accepted';
  storage: Storage = sessionStorage;
  step = '1 of 1';
  stepId = 'accept-fcra'; // first step

  constructor(
    private router: Router,
    private aclService: AclService,
    private snackBar: MatSnackBar,
    @Inject(ACL_ROUTES) public ACL: AclRoutesInterface
  ) {
    if (this.aclService.hasNrEnabled()) {
      this.step = '1 of 2';
    }
  }

  public get acceptedFCRAUse(): boolean {
    return this.storage.getItem(this.permittedUseFCRA) === this.acceptedValue;
  }

  public set acceptedFCRAUse(v: boolean) {
    this.storage.setItem(this.permittedUseFCRA, (v ? this.acceptedValue : null));
  }

  public get acceptedNonFCRAUse(): boolean {
    return this.storage.getItem(this.permittedUseNonFCRA) === this.acceptedValue;
  }

  public set acceptedNonFCRAUse(v: boolean) {
    this.storage.setItem(this.permittedUseNonFCRA, (v ? this.acceptedValue : null));
  }

  ngOnInit() {
    this.storage.removeItem(this.permittedUseFCRA);
    this.storage.removeItem(this.permittedUseNonFCRA);
    this.snackBar.dismiss();
  }

  onSubmit() {
    if (this.aclService.hasNrEnabled()) {
      this.stepId = 'accept-nonfcra';
      if (this.acceptedFCRAUse && !this.acceptedNonFCRAUse) {
        this.acceptedNonFCRAUse = true;
      }

      if (!this.acceptedFCRAUse) {
        this.acceptedFCRAUse = true;
        this.step = '2 of 2';
      }

      if (this.acceptedFCRAUse && this.acceptedNonFCRAUse) {
        this.router.navigate([this.aclService.getModuleRoute()]);
      }
    } else {
      this.acceptedFCRAUse = true;
      this.router.navigate([this.aclService.getModuleRoute()]);
    }
  }

  onCancel() {
    this.router.navigate([this.ACL.AUTH_LOGOUT]);
  }

}
