import { RuleInterface } from '../acl-route-permissions';
import { ProductModuleCodes } from '@app/shared/enums/product-module-codes.enum';
import { ACL_ROUTES_VALUES as ROUTES } from '../acl-routes';
import { AclPermissions } from '../acl-roles-permissions';

export const RULES_CBP: RuleInterface[] = [
  { rule: ROUTES.INITIAL_INVESTIGATION_SEARCH, permissions: [AclPermissions.dcbp.search], module: ProductModuleCodes.CBP },
  { rule: ROUTES.NEWREPORT, permissions: [AclPermissions.dcbp.newreport], module: ProductModuleCodes.CBP },
  { rule: ROUTES.REPORTS, permissions: [AclPermissions.dcbp.viewReports], module: ProductModuleCodes.CBP, regex: true },
  { rule: ROUTES.MYREPORTS, permissions: [AclPermissions.dcbp.viewReports], module: ProductModuleCodes.CBP, regex: true },
  { rule: ROUTES.REPORTS_HISTORY, permissions: [AclPermissions.dcbp.search], module: ProductModuleCodes.CBP, regex: true },
  { rule: ROUTES.EXPORT_PR, permissions: [AclPermissions.dcbp.publicRecordsFcraEnabled], module: ProductModuleCodes.CBP, regex: true },
  { rule: ROUTES.EXPORT_CR, permissions: [AclPermissions.dcbp.creditReportEnabled], module: ProductModuleCodes.CBP, regex: true },
  { rule: ROUTES.EXPORT_COMBINED, permissions: [AclPermissions.dcbp.viewReports], module: ProductModuleCodes.CBP, regex: true },
];
