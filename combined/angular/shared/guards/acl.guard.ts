import { Injectable, Inject } from '@angular/core';
import { CanActivateChild, Router, ActivatedRouteSnapshot, RouterStateSnapshot } from '@angular/router';
import { AclService } from '../services/acl/acl.service';
import { ACL_ROUTES } from '../services/acl/config/acl-routes';
import { AclRoutesInterface } from '../services/acl/config/acl-routes.interface';

@Injectable()
export class AclGuard implements CanActivateChild {

  constructor(
    private router: Router,
    private aclService: AclService,
    @Inject(ACL_ROUTES) private ACL: AclRoutesInterface
  ) {}

  canActivateChild(route: ActivatedRouteSnapshot, state: RouterStateSnapshot) {
    if (!this.aclService.canAccess(state.url)) {
      const moduleRoute = this.aclService.getModuleRoute();
      if (state.url !== moduleRoute) {
        this.router.navigate([this.aclService.getModuleRoute()]);
      } else {
        this.router.navigate([this.ACL.AUTH_LOGOUT]);
      }
      return false;
    }
    return true;
  }

}
