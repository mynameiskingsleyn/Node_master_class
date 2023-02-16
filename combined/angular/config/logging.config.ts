import { InjectionToken } from '@angular/core';
import { environment } from '@environment';

export interface AppInsightsConfig {
  enabled: boolean;
  connectionString: string;
}

export const APP_INSIGHTS_CONFIG: AppInsightsConfig = {
  enabled: environment.appInsights.enabled,
  connectionString: environment.appInsights.connectionString,
};

export const APP_INSIGHTS = new InjectionToken<AppInsightsConfig>('appinsights.config');