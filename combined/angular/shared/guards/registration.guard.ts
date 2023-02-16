import { Injectable, Inject } from '@angular/core';
import { Router, CanActivateChild, ActivatedRouteSnapshot, RouterStateSnapshot } from '@angular/router';
import { ACL_ROUTES } from '../services/acl/config/acl-routes';
import { AclService } from '../services/acl/acl.service';
import { AclRoutesInterface } from '../services/acl/config/acl-routes.interface';

@Injectable()
export class RegistrationGuard implements CanActivateChild {

  constructor(
    public router: Router,
    private aclService: AclService,
    @Inject(ACL_ROUTES) private ACL: AclRoutesInterface
  ) {}

  canActivateChild(route: ActivatedRouteSnapshot, state: RouterStateSnapshot) {
    if (this.checkUserRegistration()) {
      this.router.navigate([this.ACL.REGISTRATION]);
      return false;
    }
    return true;
  }

  private checkUserRegistration() {
    return this.aclService.requiresRegistration();
  }

}
