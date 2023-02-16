import { APP_BASE_HREF } from '@angular/common';
import { BrowserModule } from '@angular/platform-browser';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { NgModule } from '@angular/core';
import { APP_CONFIG, APP_DI_CONFIG } from '@app/config/app.config';
import { CoreModule } from '@core/core.module';
import { AppComponent } from '@app/app.component';
import { AppRoutingModule } from '@app/app-routing.module';
import { GlobalSearchService } from './core/utils/global-search.service';
import { ACL_ROUTES, ACL_ROUTES_VALUES } from './shared/services/acl/config/acl-routes';
import { APP_INSIGHTS, APP_INSIGHTS_CONFIG } from './config/logging.config';
import { ApplicationInsightsService } from './shared/services/application-insights.service';

@NgModule({
    declarations: [AppComponent],
    imports: [
        BrowserModule,
        BrowserAnimationsModule,
        AppRoutingModule,
        CoreModule,
    ],
    bootstrap: [AppComponent],
    providers: [
        { provide: APP_CONFIG, useValue: APP_DI_CONFIG },
        { provide: ACL_ROUTES, useValue: ACL_ROUTES_VALUES },
        { provide: APP_BASE_HREF, useValue: '/' },
        { provide: APP_INSIGHTS, useValue: APP_INSIGHTS_CONFIG },
        GlobalSearchService,
        ApplicationInsightsService
    ],
})
export class AppModule {
    constructor(appInsights: ApplicationInsightsService) {
    }
 }
