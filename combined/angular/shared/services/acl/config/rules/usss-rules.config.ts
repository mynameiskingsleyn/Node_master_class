import { RuleInterface } from '../acl-route-permissions';
import { ProductModuleCodes } from '@app/shared/enums/product-module-codes.enum';
import { ACL_ROUTES_VALUES as ROUTES } from '../acl-routes';
import { AclPermissions } from '../acl-roles-permissions';

export const RULES_USSS: RuleInterface[] = [
  { rule: ROUTES.INITIAL_INVESTIGATION_SEARCH, permissions: [AclPermissions.usss.search], module: ProductModuleCodes.USSS },
  { rule: ROUTES.NEWREPORT, permissions: [AclPermissions.usss.newreport], module: ProductModuleCodes.USSS },
  { rule: ROUTES.REPORTS, permissions: [AclPermissions.usss.viewReports], module: ProductModuleCodes.USSS, regex: true },
  { rule: ROUTES.MYREPORTS, permissions: [AclPermissions.usss.viewReports], module: ProductModuleCodes.USSS, regex: true },
  { rule: ROUTES.REPORTS_HISTORY, permissions: [AclPermissions.usss.search], module: ProductModuleCodes.USSS, regex: true },
  { rule: ROUTES.EXPORT_PR, permissions: [AclPermissions.usss.publicRecordsFcraEnabled], module: ProductModuleCodes.USSS, regex: true },
  { rule: ROUTES.EXPORT_CR, permissions: [AclPermissions.usss.creditReportEnabled], module: ProductModuleCodes.USSS, regex: true },
  { rule: ROUTES.EXPORT_COMBINED, permissions: [AclPermissions.usss.viewReports], module: ProductModuleCodes.USSS, regex: true },
];
