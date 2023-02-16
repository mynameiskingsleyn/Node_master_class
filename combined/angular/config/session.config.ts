import { environment } from '@environment';
import { InjectionToken } from '@angular/core';
import { LnxSessionConfig } from '@lnx/authentication';

export const USER_SESSION_CONFIG: LnxSessionConfig = {
  checkIdleEvery: environment.auth.session.checkIdleEvery,
  userAnswerTime: environment.auth.session.userAnswerTime,
  autoRenewCheck: environment.auth.session.autoRenewCheck,
  idleAfter: environment.auth.session.idleAfter,
  expireAfter: environment.auth.session.expireAfter,
  renewWithin: environment.auth.session.renewWithin,
  debug: environment.auth.session.debug,
};

export const APP_SESSION_CONFIG = new InjectionToken<LnxSessionConfig>('config.session');
