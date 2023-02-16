import { RuleInterface } from '../acl-route-permissions';
import { ProductModuleCodes } from '@app/shared/enums/product-module-codes.enum';
import { ACL_ROUTES_VALUES as ROUTES } from '../acl-routes';
import { AclPermissions } from '../acl-roles-permissions';

export const RULES_FEMA: RuleInterface[] = [
  { rule: ROUTES.INITIAL_INVESTIGATION_SEARCH, permissions: [AclPermissions.fema.search], module: ProductModuleCodes.FEMA },
  { rule: ROUTES.NEWREPORT, permissions: [AclPermissions.fema.newreport], module: ProductModuleCodes.FEMA },
  { rule: ROUTES.REPORTS, permissions: [AclPermissions.fema.viewReports], module: ProductModuleCodes.FEMA, regex: true },
  { rule: ROUTES.MYREPORTS, permissions: [AclPermissions.fema.viewReports], module: ProductModuleCodes.FEMA, regex: true },
  { rule: ROUTES.REPORTS_HISTORY, permissions: [AclPermissions.fema.search], module: ProductModuleCodes.FEMA, regex: true },
  { rule: ROUTES.EXPORT_PR, permissions: [AclPermissions.fema.publicRecordsFcraEnabled], module: ProductModuleCodes.FEMA, regex: true },
  { rule: ROUTES.EXPORT_CR, permissions: [AclPermissions.fema.creditReportEnabled], module: ProductModuleCodes.FEMA, regex: true },
  { rule: ROUTES.EXPORT_COMBINED, permissions: [AclPermissions.fema.viewReports], module: ProductModuleCodes.FEMA, regex: true },
];
