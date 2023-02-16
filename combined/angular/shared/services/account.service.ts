import { Injectable } from '@angular/core';
import { LnxAuthenticationAccountService } from '@lnx/authentication';
import { NVP_VALUES as nvpValues } from '@shared/services/acl/config/acl-roles-permissions';

@Injectable()
export class AccountService {

  constructor(private accountService: LnxAuthenticationAccountService) { }

  public getAccount() {
    return JSON.parse(this.accountService.get());
  }

  public getUserInfo(): any {
    return this.getAccount().user.userInfo;
  }

  public getLoginInfo(): any {
    return this.getAccount().user.loginInfo;
  }

  public getRoles(): any[] {
    return this.getAccount().user.roles;
  }

  public getPermissions(): any[] {
    return this.getAccount().user.permissions;
  }

  public getNvps(): any[] {
    return this.getAccount().user.nvps;
  }

  public getProductCode(): string {
    return this.getNvpValue(nvpValues.productCode);
  }

  public getNvpValue(nvpName: string) {
    if (!this.getAccount()) {
      return null;
    }
    const nvps = this.getNvps();
    const found = nvps.find((nvp) => nvp.name === nvpName);
    return (found) ? found.value : null;
  }

}
