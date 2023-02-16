import { Inject, Injectable } from '@angular/core';
import { ApplicationInsights } from '@microsoft/applicationinsights-web';
import { AngularPlugin } from '@microsoft/applicationinsights-angularplugin-js';
import { Router } from '@angular/router';
import { AppInsightsConfig, APP_INSIGHTS } from '@app/config/logging.config';
import { environment } from '@environment';
import { LnxErrorHandlerService } from '@lnx/core';

@Injectable({
  providedIn: 'root'
})
export class ApplicationInsightsService {

    constructor(
        private router: Router,
        @Inject(APP_INSIGHTS) public aiConfig: AppInsightsConfig,
    ){

        if (aiConfig.enabled) {
            const connectionString = aiConfig.connectionString;

            if (connectionString) {
                const angularPlugin = new AngularPlugin();
                const appInsights = new ApplicationInsights({ config: {
                connectionString: aiConfig.connectionString,
                extensions: [angularPlugin],
                extensionConfig: {
                    [angularPlugin.identifier]: {
                        router: this.router,
                        errorServices: [new LnxErrorHandlerService(environment)]
                    }
                }
                } });
                appInsights.loadAppInsights();
            }
        }
    }
}
