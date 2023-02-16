import { RuleInterface } from '../acl-route-permissions';
import { ProductModuleCodes } from '@app/shared/enums/product-module-codes.enum';
import { ACL_ROUTES_VALUES as ROUTES } from '../acl-routes';
import { AclPermissions } from '../acl-roles-permissions';

export const RULES_CSO: RuleInterface[] = [
  { rule: ROUTES.INITIAL_INVESTIGATION_SEARCH, permissions: [AclPermissions.dcso.search], module: ProductModuleCodes.CSO },
  { rule: ROUTES.NEWREPORT, permissions: [AclPermissions.dcso.newreport], module: ProductModuleCodes.CSO },
  { rule: ROUTES.REPORTS, permissions: [AclPermissions.dcso.viewReports], module: ProductModuleCodes.CSO, regex: true },
  { rule: ROUTES.MYREPORTS, permissions: [AclPermissions.dcso.viewReports], module: ProductModuleCodes.CSO, regex: true },
  { rule: ROUTES.REPORTS_HISTORY, permissions: [AclPermissions.dcso.search], module: ProductModuleCodes.CSO, regex: true },
  { rule: ROUTES.EXPORT_PR, permissions: [AclPermissions.dcso.publicRecordsFcraEnabled], module: ProductModuleCodes.CSO, regex: true },
  { rule: ROUTES.EXPORT_CR, permissions: [AclPermissions.dcso.creditReportEnabled], module: ProductModuleCodes.CSO, regex: true },
  { rule: ROUTES.EXPORT_COMBINED, permissions: [AclPermissions.dcso.viewReports], module: ProductModuleCodes.CSO, regex: true },
];
