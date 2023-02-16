import { environment } from '@environment';
import {
    LnxAuthenticationConfig,
    LnxAuthenticationBackendRoutes,
} from '@lnx/authentication';

const REST_API = environment.api.prefix + environment.api.version;
const GRAPHQL_API = environment.graphqlURI;

const AUTH_API_ROUTES: LnxAuthenticationBackendRoutes = {
    login:   REST_API + environment.auth.apiEndpoints.login,
    logout:  REST_API + environment.auth.apiEndpoints.logout,
    account: REST_API + environment.auth.apiEndpoints.account,
    renew:   REST_API + environment.auth.apiEndpoints.renew,
    forgot:  REST_API + environment.auth.apiEndpoints.forgot
};

export const AUTH_CONFIG: LnxAuthenticationConfig = {
    authJwtToken:   environment.auth.authJwtToken,
    identityToken:  environment.auth.identityToken,
    allowedDomains: [],
    disallowedRoutes: [],
    logonRedirect:  environment.auth.logonRedirect,
    loginRedirect:  environment.auth.loginRedirect,
    logoutRedirect: environment.auth.logoutRedirect,
    logoutRoute:    environment.auth.logoutRoute,
    storage:        environment.auth.storage,
    backend:        environment.backend,
    graphqlUri:     GRAPHQL_API,
    api:            AUTH_API_ROUTES,
};
