import { RuleInterface } from '../acl-route-permissions';
import { ProductModuleCodes } from '@app/shared/enums/product-module-codes.enum';
import { ACL_ROUTES_VALUES as ROUTES } from '../acl-routes';
import { AclPermissions } from '../acl-roles-permissions';

export const RULES_USCIS: RuleInterface[] = [
  { rule: ROUTES.INITIAL_INVESTIGATION_SEARCH, permissions: [AclPermissions.dcis.search], module: ProductModuleCodes.USCIS },
  { rule: ROUTES.NEWREPORT, permissions: [AclPermissions.dcis.newreport], module: ProductModuleCodes.USCIS },
  { rule: ROUTES.REPORTS, permissions: [AclPermissions.dcis.viewReports], module: ProductModuleCodes.USCIS, regex: true },
  { rule: ROUTES.MYREPORTS, permissions: [AclPermissions.dcis.viewReports], module: ProductModuleCodes.USCIS, regex: true },
  { rule: ROUTES.REPORTS_HISTORY, permissions: [AclPermissions.dcis.search], module: ProductModuleCodes.USCIS, regex: true },
  { rule: ROUTES.EXPORT_PR, permissions: [AclPermissions.dcis.publicRecordsFcraEnabled], module: ProductModuleCodes.USCIS, regex: true },
  { rule: ROUTES.EXPORT_CR, permissions: [AclPermissions.dcis.creditReportEnabled], module: ProductModuleCodes.USCIS, regex: true },
  { rule: ROUTES.EXPORT_COMBINED, permissions: [AclPermissions.dcis.viewReports], module: ProductModuleCodes.USCIS, regex: true },
];
