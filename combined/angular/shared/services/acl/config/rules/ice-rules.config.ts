import { RuleInterface } from '../acl-route-permissions';
import { ProductModuleCodes } from '@app/shared/enums/product-module-codes.enum';
import { ACL_ROUTES_VALUES as ROUTES } from '../acl-routes';
import { AclPermissions } from '../acl-roles-permissions';

export const RULES_ICE: RuleInterface[] = [
  { rule: ROUTES.INITIAL_INVESTIGATION_SEARCH, permissions: [AclPermissions.ice.search], module: ProductModuleCodes.ICE },
  { rule: ROUTES.NEWREPORT, permissions: [AclPermissions.ice.newreport], module: ProductModuleCodes.ICE },
  { rule: ROUTES.REPORTS, permissions: [AclPermissions.ice.viewReports], module: ProductModuleCodes.ICE, regex: true },
  { rule: ROUTES.MYREPORTS, permissions: [AclPermissions.ice.viewReports], module: ProductModuleCodes.ICE, regex: true },
  { rule: ROUTES.REPORTS_HISTORY, permissions: [AclPermissions.ice.search], module: ProductModuleCodes.ICE, regex: true },
  { rule: ROUTES.EXPORT_PR, permissions: [AclPermissions.ice.publicRecordsFcraEnabled], module: ProductModuleCodes.ICE, regex: true },
  { rule: ROUTES.EXPORT_CR, permissions: [AclPermissions.ice.creditReportEnabled], module: ProductModuleCodes.ICE, regex: true },
  { rule: ROUTES.EXPORT_COMBINED, permissions: [AclPermissions.ice.viewReports], module: ProductModuleCodes.ICE, regex: true },
];
