import { ProductModuleCodes } from '@app/shared/enums/product-module-codes.enum';
import { ACL_ROUTES_VALUES as ROUTES } from './acl-routes';
import { AclPermissions } from './acl-roles-permissions';
import { RULES_FBI } from './rules/fbi-rules.config';
import { RULES_ICE } from './rules/ice-rules.config';
import { RULES_FLETC } from './rules/fletc-rules.config';
import { RULES_CBP } from './rules/cbp-rules.config';
import { RULES_USCIS } from './rules/uscis-rules.config';
import { RULES_USCG1 } from './rules/uscg1-rules.config';
import { RULES_USCG2 } from './rules/uscg2-rules.config';
import { RULES_FPS } from './rules/fps-rules.config';
import { RULES_CSO } from './rules/cso-rules.config';
import { RULES_FEMA } from './rules/fema-rules.config';
import { RULES_TSA } from './rules/tsa-rules.config';
import { RULES_USSS } from './rules/usss-rules.config';
import { RULES_CISA } from './rules/cisa-rules.config';
import { RULES_UAID } from './rules/uaid-rules.config';

interface RoutePermissions {
  fbi: RuleInterface[];
  ice: RuleInterface[];
  flet: RuleInterface[];
  dcbp: RuleInterface[];
  dcis: RuleInterface[];
  dcg1: RuleInterface[];
  dcg2: RuleInterface[];
  dfps: RuleInterface[];
  dcso: RuleInterface[];
  fema: RuleInterface[];
  dtsa: RuleInterface[];
  usss: RuleInterface[];
  cisa: RuleInterface[];
  uaid: RuleInterface[];
}
export interface RuleInterface {
  rule: string;
  permissions: string[];
  module: ProductModuleCodes;
  regex?: boolean;
}

export const MODULE_ROUTE_PERMISSIONS: RoutePermissions = {
  fbi: RULES_FBI,
  ice: RULES_ICE,
  flet: RULES_FLETC,
  dcbp: RULES_CBP,
  dcis: RULES_USCIS,
  dcg1: RULES_USCG1,
  dcg2: RULES_USCG2,
  dfps: RULES_FPS,
  dcso: RULES_CSO,
  fema: RULES_FEMA,
  dtsa: RULES_TSA,
  usss: RULES_USSS,
  cisa: RULES_CISA,
  uaid: RULES_UAID,
};

export const GENERAL_ROUTE_PERMISSIONS: RuleInterface[] = [
  { rule: ROUTES.CHANGE_PASSWORD, permissions: [AclPermissions.all.any], module: ProductModuleCodes.ALL },
  { rule: ROUTES.HELP, permissions: [AclPermissions.all.any], module: ProductModuleCodes.ALL }
];
