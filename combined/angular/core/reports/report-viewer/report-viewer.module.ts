import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { PortalModule } from '@angular/cdk/portal';
import { ReportViewerComponent } from './report-viewer.component';
import { MaterialModule } from '@app/shared/material/material.module';
import { FlexLayoutModule } from '@angular/flex-layout';
import { ReportHeaderComponent } from '../components/report-header/report-header.component';
import { NonFCRADisclaimerComponent } from '../components/non-fcradisclaimer/non-fcradisclaimer.component';
import { PublicRecordViewComponent } from '../components/public-record-view/public-record-view.component';
import { PublicRecordExpViewComponent } from '../components/public-record-exp-view/public-record-exp-view.component';
import { CreditReportViewComponent } from '../components/credit-report-view/credit-report-view.component';
import { NonFcraPublicRecordsViewComponent } from '../components/non-fcra-public-records-view/non-fcra-public-records-view.component';
import { PipesModule } from '@app/shared/pipes/pipes.module';
import { DirectivesModule } from '@app/shared/directives/directives.module';
import { ReportsLayoutModule } from '../reports-layout/reports-layout.module';
// eslint-disable-next-line max-len
import { CreditReportContinuousMonitoringLayoutModule } from '../reports-layout/layouts/credit-report-continuous-monitoring-layout/credit-report-continuous-monitoring-layout.module';
// eslint-disable-next-line max-len
import { CreditReportInitialInvestigationsLayoutModule } from '../reports-layout/layouts/credit-report-initial-investigations-layout/credit-report-initial-investigations-layout.module';

@NgModule({
    declarations: [
        PublicRecordViewComponent,
        PublicRecordExpViewComponent,
        CreditReportViewComponent,
        NonFcraPublicRecordsViewComponent,
        ReportViewerComponent,
        ReportHeaderComponent,
        NonFCRADisclaimerComponent
    ],
    imports: [
        CommonModule,
        RouterModule,
        PortalModule,
        MaterialModule,
        FlexLayoutModule,
        PipesModule,
        DirectivesModule,
        ReportsLayoutModule,
        CreditReportContinuousMonitoringLayoutModule,
        CreditReportInitialInvestigationsLayoutModule
    ],
    exports: [
        ReportViewerComponent,
        ReportHeaderComponent,
        PublicRecordViewComponent,
        PublicRecordExpViewComponent,
        CreditReportViewComponent,
        NonFcraPublicRecordsViewComponent,
        NonFCRADisclaimerComponent
    ]
})
export class ReportViewerModule { }
