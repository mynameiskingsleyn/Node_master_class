import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { EchoHeaderComponent } from './containers/echo-header/echo-header.component';
import { IndividualInformationComponent } from './containers/individual-information/individual-information.component';
import { CreditFileComponent } from './containers/credit-file/credit-file.component';
import { TradeComponent } from './containers/trade/trade.component';
import { InquiryComponent } from './containers/inquiry/inquiry.component';
import { PublicRecordComponent } from './containers/public-record/public-record.component';
import { CreditReportInitialInvestigationsLayoutComponent } from './credit-report-initial-investigations-layout.component';
import { ReportsLayoutModule } from '../../reports-layout.module';
import { PipesModule } from '@app/shared/pipes/pipes.module';
import { MaterialModule } from '@app/shared/material/material.module';
import { CollectionsComponent } from './containers/collections/collections.component';
import { APP_DATE_FORMATS, DATE_FORMATS_CONFIG } from '@app/config/locale.config';

@NgModule({
    declarations: [
        CreditReportInitialInvestigationsLayoutComponent,
        EchoHeaderComponent,
        IndividualInformationComponent,
        CreditFileComponent,
        TradeComponent,
        InquiryComponent,
        PublicRecordComponent,
        CollectionsComponent
    ],
    imports: [CommonModule, ReportsLayoutModule, MaterialModule, PipesModule],
    exports: [CreditReportInitialInvestigationsLayoutComponent],
    providers: [
        { provide: DATE_FORMATS_CONFIG, useValue: APP_DATE_FORMATS },
    ]
})
export class CreditReportInitialInvestigationsLayoutModule {}
