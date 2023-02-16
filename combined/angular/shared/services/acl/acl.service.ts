import { Injectable } from '@angular/core';
import { AccountService } from '../account.service';
import {
  MODULE_ROUTE_PERMISSIONS as routePermissions,
  GENERAL_ROUTE_PERMISSIONS as generalPermissions,
  RuleInterface
} from './config/acl-route-permissions';
import {
  NVP_VALUES as nvpValues,
  PERMISSIONS_VALUES as permissionValues
} from '@shared/services/acl/config/acl-roles-permissions';
import { ProductModuleCodes } from '@app/shared/enums/product-module-codes.enum';
import { ACL_ROUTES_VALUES as aclRoutes } from './config/acl-routes';
import { PermittedUse } from '@app/core/permitted-use/permitted-use.enum';

@Injectable()
export class AclService {

  constructor(private accountService: AccountService) { }

  public canAccess(route: string): boolean {
    const rule = this.getRule(route);
    if (rule) {
      if (ProductModuleCodes.ALL === rule.module) {
        return true;
      }
      return this.checkModuleRule(rule) && (this.checkPermissions(rule) || this.checkNvpPermissions(rule));
    }
    return false;
  }

  public getModuleRoute(): string {
    switch (this.getUserProductCode()) {
      case ProductModuleCodes.FBI:
        return aclRoutes.SEARCH;
      case ProductModuleCodes.ICE:
      case ProductModuleCodes.FLETC:
      case ProductModuleCodes.CBP:
      case ProductModuleCodes.USCIS:
      case ProductModuleCodes.USCG1:
      case ProductModuleCodes.USCG2:
      case ProductModuleCodes.FPS:
      case ProductModuleCodes.CSO:
      case ProductModuleCodes.FEMA:
      case ProductModuleCodes.TSA:
      case ProductModuleCodes.USSS:
      case ProductModuleCodes.CISA:
      case ProductModuleCodes.UAID:
        return aclRoutes.INITIAL_INVESTIGATION_SEARCH;
      default:
        return aclRoutes.AUTH_LOGOUT;
    }
  }

  public hasModuleAccess(route: string): boolean {
    const rule = this.getRule(route);
    return (rule) ? this.checkModuleRule(rule) : false;
  }

  public hasPermissions(route: string): boolean {
    const rule = this.getRule(route);
    return (rule) ? this.checkPermissions(rule) : false;
  }

  public hasNvpPermission(route: string): boolean {
    const rule = this.getRule(route);
    return (rule) ? this.checkNvpPermissions(rule) : false;
  }

  public requiresRegistration(): boolean {
    const selfEnroll = this.accountService.getNvpValue(permissionValues.registration);
    const employeeId = this.accountService.getNvpValue(nvpValues.employeeId);
    const registration = selfEnroll && selfEnroll === '1';
    const hasEmployeeId = employeeId && employeeId !== '' && employeeId !== 0;
    return registration && !hasEmployeeId;
  }

  public hasMonitoringEnabled(): boolean {
    const monitoring = this.accountService.getNvpValue(permissionValues.monitoring);
    return monitoring && monitoring === '1';
  }

  public hasPrEnabled(): boolean {
    const prEnabled = this.accountService.getNvpValue(permissionValues.publicRecordsFcraEnabled);
    return prEnabled && prEnabled === '1';
  }

  public hasNrEnabled(): boolean {
    const nrEnabled = this.accountService.getNvpValue(permissionValues.publicRecordsNonFcraEnabled);
    return nrEnabled && nrEnabled === '1';
  }

  public hasCrEnabled(): boolean {
    const crEnabled = this.accountService.getNvpValue(permissionValues.creditReportEnabled);
    return crEnabled && crEnabled === '1';
  }

  public hasCombinedEnabled(): boolean {
    if ((this.hasCrEnabled() && this.hasPrEnabled())
        || (this.hasCrEnabled() && this.hasNrEnabled())) {
      return true;
    }
    if (this.hasPrEnabled() && this.hasNrEnabled()) {
      return true;
    }
    return false;
  }

  public agencyNotesDisabled(): boolean {
    const notesDisabled = this.accountService.getNvpValue(nvpValues.agencyNotesDisabled);
    return notesDisabled && notesDisabled === '1';
  }

  public noRecordReportSmall(): boolean {
    const smallReport = this.accountService.getNvpValue(permissionValues.noRecordReportSmall);
    return smallReport && smallReport === '1';
  }

  public showAgencySubjectId(): boolean {
    const agencySubjectId = this.accountService.getNvpValue(permissionValues.showAgencySubjectId);
    return agencySubjectId && agencySubjectId === '1';
  }

  public allowedPermission(value: string): boolean {
    const permissionFound = this.accountService.getPermissions().find(userPerm => userPerm.code === value);
    const nvpFound = this.accountService.getNvps().find(userNvp => userNvp.name === value && userNvp.value === '1');

    return (typeof permissionFound !== 'undefined') || (typeof nvpFound !== 'undefined');
  }

  private getUserProductCode(): string {
    return this.accountService.getNvpValue(nvpValues.productCode);
  }

  private checkModuleRule(rule: RuleInterface): boolean {
    return rule.module === this.getUserProductCode();
  }

  private checkPermissions(rule: RuleInterface): boolean {
    for (const permission of rule.permissions) {
      const access = this.accountService.getPermissions().find(userPerm => userPerm.code === permission);
      if (access) {
        return true;
      }
    }
    return false;
  }

  private checkNvpPermissions(rule: RuleInterface): boolean {
    for (const permission of rule.permissions) {
      const access = this.accountService.getNvps().find(userNvp => userNvp.name === permission && userNvp.value === '1');
      if (access) {
        return true;
      }
    }
    return false;
  }

  private getRule(route: string): RuleInterface {
    const permissions = this.getActivePermissions();
    return permissions.find((curr) => {
      if (curr.rule === route) {
        return true;
      } else if (curr.regex) {
        const regex = RegExp(curr.rule);
        return regex.test(route);
      }
      return false;
    });
  }

  private getActivePermissions(): RuleInterface[] {
    const module = this.getUserProductCode();
    return [
      ...generalPermissions,
      ...routePermissions[module]
    ];
  }

  public acceptedPermittedUses() {

      const acceptedValue = 'accepted';
      const acceptedPermittedUses = [];

      if (this.hasPrEnabled()) {
          acceptedPermittedUses.push(PermittedUse.FCRA);
      }
      if (this.hasNrEnabled()) {
          acceptedPermittedUses.push(PermittedUse.NonFCRA);
      }

      for (const grant of acceptedPermittedUses) {
        if (sessionStorage.getItem(grant) !== acceptedValue) {
          return false;
        }
      }
      return true;
  }

}
