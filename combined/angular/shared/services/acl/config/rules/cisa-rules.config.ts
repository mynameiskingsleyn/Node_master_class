import { RuleInterface } from '../acl-route-permissions';
import { ProductModuleCodes } from '@app/shared/enums/product-module-codes.enum';
import { ACL_ROUTES_VALUES as ROUTES } from '../acl-routes';
import { AclPermissions } from '../acl-roles-permissions';

export const RULES_CISA: RuleInterface[] = [
  { rule: ROUTES.INITIAL_INVESTIGATION_SEARCH, permissions: [AclPermissions.cisa.search], module: ProductModuleCodes.CISA },
  { rule: ROUTES.NEWREPORT, permissions: [AclPermissions.cisa.newreport], module: ProductModuleCodes.CISA },
  { rule: ROUTES.REPORTS, permissions: [AclPermissions.cisa.viewReports], module: ProductModuleCodes.CISA, regex: true },
  { rule: ROUTES.MYREPORTS, permissions: [AclPermissions.cisa.viewReports], module: ProductModuleCodes.CISA, regex: true },
  { rule: ROUTES.REPORTS_HISTORY, permissions: [AclPermissions.cisa.search], module: ProductModuleCodes.CISA, regex: true },
  { rule: ROUTES.EXPORT_PR, permissions: [AclPermissions.cisa.publicRecordsFcraEnabled], module: ProductModuleCodes.CISA, regex: true },
  { rule: ROUTES.EXPORT_CR, permissions: [AclPermissions.cisa.creditReportEnabled], module: ProductModuleCodes.CISA, regex: true },
  { rule: ROUTES.EXPORT_COMBINED, permissions: [AclPermissions.cisa.viewReports], module: ProductModuleCodes.CISA, regex: true },
];
