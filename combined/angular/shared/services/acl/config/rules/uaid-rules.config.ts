import { RuleInterface } from '../acl-route-permissions';
import { ProductModuleCodes } from '@app/shared/enums/product-module-codes.enum';
import { ACL_ROUTES_VALUES as ROUTES } from '../acl-routes';
import { AclPermissions } from '../acl-roles-permissions';

export const RULES_UAID: RuleInterface[] = [
  { rule: ROUTES.INITIAL_INVESTIGATION_SEARCH, permissions: [AclPermissions.uaid.search], module: ProductModuleCodes.UAID },
  { rule: ROUTES.NEWREPORT, permissions: [AclPermissions.uaid.newreport], module: ProductModuleCodes.UAID },
  { rule: ROUTES.REPORTS, permissions: [AclPermissions.uaid.viewReports], module: ProductModuleCodes.UAID, regex: true },
  { rule: ROUTES.MYREPORTS, permissions: [AclPermissions.uaid.viewReports], module: ProductModuleCodes.UAID, regex: true },
  { rule: ROUTES.REPORTS_HISTORY, permissions: [AclPermissions.uaid.search], module: ProductModuleCodes.UAID, regex: true },
  { rule: ROUTES.EXPORT_PR, permissions: [AclPermissions.uaid.publicRecordsFcraEnabled], module: ProductModuleCodes.UAID, regex: true },
  { rule: ROUTES.EXPORT_CR, permissions: [AclPermissions.uaid.creditReportEnabled], module: ProductModuleCodes.UAID, regex: true },
  { rule: ROUTES.EXPORT_COMBINED, permissions: [AclPermissions.uaid.viewReports], module: ProductModuleCodes.UAID, regex: true },
];
