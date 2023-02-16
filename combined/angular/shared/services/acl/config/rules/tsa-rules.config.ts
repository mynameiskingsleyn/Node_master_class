import { RuleInterface } from '../acl-route-permissions';
import { ProductModuleCodes } from '@app/shared/enums/product-module-codes.enum';
import { ACL_ROUTES_VALUES as ROUTES } from '../acl-routes';
import { AclPermissions } from '../acl-roles-permissions';

export const RULES_TSA: RuleInterface[] = [
  { rule: ROUTES.INITIAL_INVESTIGATION_SEARCH, permissions: [AclPermissions.dtsa.search], module: ProductModuleCodes.TSA },
  { rule: ROUTES.NEWREPORT, permissions: [AclPermissions.dtsa.newreport], module: ProductModuleCodes.TSA },
  { rule: ROUTES.REPORTS, permissions: [AclPermissions.dtsa.viewReports], module: ProductModuleCodes.TSA, regex: true },
  { rule: ROUTES.MYREPORTS, permissions: [AclPermissions.dtsa.viewReports], module: ProductModuleCodes.TSA, regex: true },
  { rule: ROUTES.REPORTS_HISTORY, permissions: [AclPermissions.dtsa.search], module: ProductModuleCodes.TSA, regex: true },
  { rule: ROUTES.EXPORT_PR, permissions: [AclPermissions.dtsa.publicRecordsFcraEnabled], module: ProductModuleCodes.TSA, regex: true },
  { rule: ROUTES.EXPORT_CR, permissions: [AclPermissions.dtsa.creditReportEnabled], module: ProductModuleCodes.TSA, regex: true },
  { rule: ROUTES.EXPORT_COMBINED, permissions: [AclPermissions.dtsa.viewReports], module: ProductModuleCodes.TSA, regex: true },
];
