import { InjectionToken } from '@angular/core';
import { AclRoutesInterface } from './acl-routes.interface';

export const ACL_ROUTES_VALUES: AclRoutesInterface = {
    AUTH_LOGIN: '/auth/login',
    AUTH_LOGOUT: '/auth/logout',
    AUTH_HELP: '/auth/help',
    AUTH_CHANGE_PASSWORD: '/auth/forgot-password',
    REGISTRATION: '/registration',
    SEARCH: '/search',
    INITIAL_INVESTIGATION_SEARCH: '/initial-investigation-search',
    ALERTS: '/my-alerts',
    REPORTS: '/reports/(.*)',
    MYREPORTS: '/my-reports',
    NEWREPORT: '/new-report',
    REPORTS_HISTORY: '/reports/history/(.*)',
    EXPORT_PR: '/export/report/pr',
    EXPORT_CR: '/export/report/cr',
    EXPORT_NR: '/export/report/nr',
    EXPORT_COMBINED: '/export/report/complete',
    CHANGE_PASSWORD: '/change-password',
    HELP: '/help'
};

export const ACL_ROUTES = new InjectionToken<AclRoutesInterface>('acl.values');
