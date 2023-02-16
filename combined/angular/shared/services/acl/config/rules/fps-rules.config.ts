import { RuleInterface } from '../acl-route-permissions';
import { ProductModuleCodes } from '@app/shared/enums/product-module-codes.enum';
import { ACL_ROUTES_VALUES as ROUTES } from '../acl-routes';
import { AclPermissions } from '../acl-roles-permissions';

export const RULES_FPS: RuleInterface[] = [
  { rule: ROUTES.INITIAL_INVESTIGATION_SEARCH, permissions: [AclPermissions.dfps.search], module: ProductModuleCodes.FPS },
  { rule: ROUTES.NEWREPORT, permissions: [AclPermissions.dfps.newreport], module: ProductModuleCodes.FPS },
  { rule: ROUTES.REPORTS, permissions: [AclPermissions.dfps.viewReports], module: ProductModuleCodes.FPS, regex: true },
  { rule: ROUTES.MYREPORTS, permissions: [AclPermissions.dfps.viewReports], module: ProductModuleCodes.FPS, regex: true },
  { rule: ROUTES.REPORTS_HISTORY, permissions: [AclPermissions.dfps.search], module: ProductModuleCodes.FPS, regex: true },
  { rule: ROUTES.EXPORT_PR, permissions: [AclPermissions.dfps.publicRecordsFcraEnabled], module: ProductModuleCodes.FPS, regex: true },
  { rule: ROUTES.EXPORT_CR, permissions: [AclPermissions.dfps.creditReportEnabled], module: ProductModuleCodes.FPS, regex: true },
  { rule: ROUTES.EXPORT_COMBINED, permissions: [AclPermissions.dfps.viewReports], module: ProductModuleCodes.FPS, regex: true },
];
