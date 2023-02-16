import { RuleInterface } from '../acl-route-permissions';
import { ProductModuleCodes } from '@app/shared/enums/product-module-codes.enum';
import { ACL_ROUTES_VALUES as ROUTES } from '../acl-routes';
import { AclPermissions } from '../acl-roles-permissions';

export const RULES_FLETC: RuleInterface[] = [
  { rule: ROUTES.INITIAL_INVESTIGATION_SEARCH, permissions: [AclPermissions.flet.search], module: ProductModuleCodes.FLETC },
  { rule: ROUTES.NEWREPORT, permissions: [AclPermissions.flet.newreport], module: ProductModuleCodes.FLETC },
  { rule: ROUTES.REPORTS, permissions: [AclPermissions.flet.viewReports], module: ProductModuleCodes.FLETC, regex: true },
  { rule: ROUTES.MYREPORTS, permissions: [AclPermissions.flet.viewReports], module: ProductModuleCodes.FLETC, regex: true },
  { rule: ROUTES.REPORTS_HISTORY, permissions: [AclPermissions.flet.search], module: ProductModuleCodes.FLETC, regex: true },
  { rule: ROUTES.EXPORT_PR, permissions: [AclPermissions.flet.publicRecordsFcraEnabled], module: ProductModuleCodes.FLETC, regex: true },
  { rule: ROUTES.EXPORT_CR, permissions: [AclPermissions.flet.creditReportEnabled], module: ProductModuleCodes.FLETC, regex: true },
  { rule: ROUTES.EXPORT_COMBINED, permissions: [AclPermissions.flet.viewReports], module: ProductModuleCodes.FLETC, regex: true },
];
