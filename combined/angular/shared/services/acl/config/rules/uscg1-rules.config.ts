import { RuleInterface } from '../acl-route-permissions';
import { ProductModuleCodes } from '@app/shared/enums/product-module-codes.enum';
import { ACL_ROUTES_VALUES as ROUTES } from '../acl-routes';
import { AclPermissions } from '../acl-roles-permissions';

export const RULES_USCG1: RuleInterface[] = [
  { rule: ROUTES.INITIAL_INVESTIGATION_SEARCH, permissions: [AclPermissions.dcg1.search], module: ProductModuleCodes.USCG1 },
  { rule: ROUTES.NEWREPORT, permissions: [AclPermissions.dcg1.newreport], module: ProductModuleCodes.USCG1 },
  { rule: ROUTES.REPORTS, permissions: [AclPermissions.dcg1.viewReports], module: ProductModuleCodes.USCG1, regex: true },
  { rule: ROUTES.MYREPORTS, permissions: [AclPermissions.dcg1.viewReports], module: ProductModuleCodes.USCG1, regex: true },
  { rule: ROUTES.REPORTS_HISTORY, permissions: [AclPermissions.dcg1.search], module: ProductModuleCodes.USCG1, regex: true },
  { rule: ROUTES.EXPORT_PR, permissions: [AclPermissions.dcg1.publicRecordsFcraEnabled], module: ProductModuleCodes.USCG1, regex: true },
  { rule: ROUTES.EXPORT_CR, permissions: [AclPermissions.dcg1.creditReportEnabled], module: ProductModuleCodes.USCG1, regex: true },
  { rule: ROUTES.EXPORT_COMBINED, permissions: [AclPermissions.dcg1.viewReports], module: ProductModuleCodes.USCG1, regex: true },
];
