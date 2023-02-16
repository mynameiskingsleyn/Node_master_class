import { RuleInterface } from '../acl-route-permissions';
import { ProductModuleCodes } from '@app/shared/enums/product-module-codes.enum';
import { ACL_ROUTES_VALUES as ROUTES } from '../acl-routes';
import { AclPermissions } from '../acl-roles-permissions';

export const RULES_FBI: RuleInterface[] = [
    { rule: ROUTES.REGISTRATION, permissions: [AclPermissions.fbi.registration], module: ProductModuleCodes.FBI },
    { rule: ROUTES.SEARCH, permissions: [AclPermissions.fbi.search], module: ProductModuleCodes.FBI },
    { rule: ROUTES.ALERTS, permissions: [AclPermissions.fbi.monitoring], module: ProductModuleCodes.FBI },
    { rule: ROUTES.REPORTS, permissions: [AclPermissions.fbi.viewReports], module: ProductModuleCodes.FBI, regex: true },
    { rule: ROUTES.REPORTS_HISTORY, permissions: [AclPermissions.fbi.search], module: ProductModuleCodes.FBI, regex: true },
    { rule: ROUTES.EXPORT_PR, permissions: [AclPermissions.fbi.publicRecordsFcraEnabled], module: ProductModuleCodes.FBI, regex: true },
    { rule: ROUTES.EXPORT_CR, permissions: [AclPermissions.fbi.creditReportEnabled], module: ProductModuleCodes.FBI, regex: true },
    { rule: ROUTES.EXPORT_NR, permissions: [AclPermissions.fbi.publicRecordsNonFcraEnabled], module: ProductModuleCodes.FBI, regex: true },
    { rule: ROUTES.EXPORT_COMBINED, permissions: [AclPermissions.fbi.viewReports], module: ProductModuleCodes.FBI, regex: true },
];
