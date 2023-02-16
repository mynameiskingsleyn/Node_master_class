import { Component, Input, Inject } from '@angular/core';
import { ACL_ROUTES } from '@app/shared/services/acl/config/acl-routes';
import { AclRoutesInterface } from '@app/shared/services/acl/config/acl-routes.interface';

@Component({
  selector: 'app-auth-actions',
  templateUrl: './auth-actions.component.html',
  styleUrls: ['./auth-actions.component.sass']
})
export class AuthActionsComponent {

  @Input() authActions: boolean;
  @Input() passwordResetActions: boolean;
  @Input() helpActions: boolean;

  constructor(@Inject(ACL_ROUTES) public ACL: AclRoutesInterface) { }

}
