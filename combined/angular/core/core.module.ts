import { NgModule, ErrorHandler } from '@angular/core';
import { HttpClientModule } from '@angular/common/http';
import { AUTH_CONFIG } from '@app/config/authentication.config';
import {
    UI_AUTH_CONFIG,
    CAPTCHA_SETTINGS,
} from '@app/config/ui-auth.config';
import {
  UI_PASSWORD_RESET_CONFIG
} from '@app/config/ui-password-reset.config';
import {
    GRAPHQL_CONFIG,
    BACKEND_GRAPHQL_CONFIG,
} from '@app/config/graphql.config';
import { LoginConfigService } from '@lnx/ui-authentication';
import { RECAPTCHA_SETTINGS, RecaptchaSettings } from 'ng-recaptcha';
import { APOLLO_OPTIONS } from 'apollo-angular';
import { GraphQLFactory } from './factories/graphql.factory';
import { HttpLink } from 'apollo-angular/http';
import { LayoutModule } from '@app/core/layout/layout.module';
import { LnxAuthenticationModule, LNX_AUTH_CONFIG, LnxSessionModule, LNX_SESSION_CONFIG } from '@lnx/authentication';
import { PasswordResetConfigService } from '@lnx/ui-password-reset';
import { SharedModule } from '@app/shared/shared.module';
import { GlobalSearchService } from './utils/global-search.service';
import { RegistrationGuard } from '@app/shared/guards/registration.guard';
import { PermittedUseGuard } from '@app/shared/guards/permitted-use.guard';
import { USER_SESSION_CONFIG } from '@app/config/session.config';
import { AclGuard } from '@app/shared/guards/acl.guard';
import { AclService } from '@app/shared/services/acl/acl.service';
import { AccountService } from '@app/shared/services/account.service';
import { DEFAULT_CURRENCY_CODE } from '@app/config/app.config';
import { LnxErrorHandlerService, LnxCoreModule, LNX_ENV } from '@lnx/core';
import { ENV_CONFIG } from '@app/config/env.config';
import { ApplicationinsightsAngularpluginErrorService } from '@microsoft/applicationinsights-angularplugin-js';

/**
 * NgModules Provider's configurations
 */
const CONFIGURATIONS = [
    { provide: LNX_ENV, useValue: ENV_CONFIG },
    { provide: LNX_AUTH_CONFIG, useValue: AUTH_CONFIG },
    { provide: LNX_SESSION_CONFIG, useValue: USER_SESSION_CONFIG },
    { provide: LoginConfigService, useValue: UI_AUTH_CONFIG },
    { provide: PasswordResetConfigService, useValue: UI_PASSWORD_RESET_CONFIG },
    {
        provide: RECAPTCHA_SETTINGS,
        useValue: CAPTCHA_SETTINGS as RecaptchaSettings,
    },
    { provide: GRAPHQL_CONFIG, useValue: BACKEND_GRAPHQL_CONFIG },
    {
        provide: APOLLO_OPTIONS,
        useFactory: GraphQLFactory,
        deps: [HttpLink, GRAPHQL_CONFIG, LnxErrorHandlerService],
    },
    { provide: DEFAULT_CURRENCY_CODE, useValue: 'USD' }
];

const SERVICES = [
    GlobalSearchService,
    AccountService,
    AclService
];

const GUARDS = [
    AclGuard,
    RegistrationGuard,
    PermittedUseGuard
];

const ERROR_HANDLER = [
  { provide: ErrorHandler, useClass: ApplicationinsightsAngularpluginErrorService }
];

@NgModule({
    declarations: [],
    imports: [
        SharedModule,
        HttpClientModule,
        LnxCoreModule.forRoot(ENV_CONFIG),
        LnxAuthenticationModule.forRoot(AUTH_CONFIG),
        LnxSessionModule.forRoot(USER_SESSION_CONFIG),
        LayoutModule,
    ],
    providers: [
        ...CONFIGURATIONS,
        ...SERVICES,
        ...GUARDS,
        ...ERROR_HANDLER
    ],
})
export class CoreModule { }
