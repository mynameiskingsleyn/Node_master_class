import { InjectionToken } from '@angular/core';
import { environment } from '@environment';

export interface DateFormatsConfig {
  parse: {
      input: any;
  };
  display: {
      default: any;
      short?: any;
      long: any;
  };
}

export const DATE_FORMATS_CONFIG = new InjectionToken<DateFormatsConfig>('app.dates.format');

export const APP_DATE_FORMATS: DateFormatsConfig = {
  parse: {
      input: environment.locale.dates.parse.input,
  },
  display: {
      default: environment.locale.dates.display.default,
      short: environment.locale.dates.display.short,
      long: environment.locale.dates.display.long,
  }
};
