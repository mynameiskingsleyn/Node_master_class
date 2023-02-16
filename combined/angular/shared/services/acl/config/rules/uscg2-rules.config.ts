import { RuleInterface } from '../acl-route-permissions';
import { ProductModuleCodes } from '@app/shared/enums/product-module-codes.enum';
import { ACL_ROUTES_VALUES as ROUTES } from '../acl-routes';
import { AclPermissions } from '../acl-roles-permissions';

export const RULES_USCG2: RuleInterface[] = [
  { rule: ROUTES.INITIAL_INVESTIGATION_SEARCH, permissions: [AclPermissions.dcg2.search], module: ProductModuleCodes.USCG2 },
  { rule: ROUTES.NEWREPORT, permissions: [AclPermissions.dcg2.newreport], module: ProductModuleCodes.USCG2 },
  { rule: ROUTES.REPORTS, permissions: [AclPermissions.dcg2.viewReports], module: ProductModuleCodes.USCG2, regex: true },
  { rule: ROUTES.MYREPORTS, permissions: [AclPermissions.dcg2.viewReports], module: ProductModuleCodes.USCG2, regex: true },
  { rule: ROUTES.REPORTS_HISTORY, permissions: [AclPermissions.dcg2.search], module: ProductModuleCodes.USCG2, regex: true },
  { rule: ROUTES.EXPORT_PR, permissions: [AclPermissions.dcg2.publicRecordsFcraEnabled], module: ProductModuleCodes.USCG2, regex: true },
  { rule: ROUTES.EXPORT_CR, permissions: [AclPermissions.dcg2.creditReportEnabled], module: ProductModuleCodes.USCG2, regex: true },
  { rule: ROUTES.EXPORT_COMBINED, permissions: [AclPermissions.dcg2.viewReports], module: ProductModuleCodes.USCG2, regex: true },
];
