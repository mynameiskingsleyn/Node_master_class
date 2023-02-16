import { Injectable } from '@angular/core';
import { Router, CanActivateChild, ActivatedRouteSnapshot, RouterStateSnapshot } from '@angular/router';
import { AclService } from '../services/acl/acl.service';

@Injectable()
export class PermittedUseGuard implements CanActivateChild {

  constructor(
      public router: Router,
      private aclService: AclService) {}

  canActivateChild(route: ActivatedRouteSnapshot, state: RouterStateSnapshot) {
      return this.aclService.acceptedPermittedUses();
  }

}
