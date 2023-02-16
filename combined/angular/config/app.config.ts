import { InjectionToken } from '@angular/core';
import { environment } from '@environment';

export interface IAppConfig {
  name: string;
  version: string;
  title: string;
  logo: string;
  copyright: string;
  terms: string;
  privacyPolicy: string;
  support: {
    email: string;
  };
  alertsPollInterval: number;
  subjectsPollInterval: number;
}

export const APP_DI_CONFIG: IAppConfig = {
  name: environment.app.name,
  version: environment.app.version,
  title: environment.app.title,
  logo: environment.app.logo,
  copyright: environment.app.copyright,
  terms: environment.app.terms,
  privacyPolicy: environment.app.privacyPolicy,
  support: {
    email: environment.app.support.email
  },
  alertsPollInterval: environment.app.alertsPollInterval,
  subjectsPollInterval: environment.app.subjectsPollInterval,
};

export const APP_CONFIG = new InjectionToken<IAppConfig>('app.config');

export const DEFAULT_CURRENCY_CODE = new InjectionToken<string>('app.currency');
