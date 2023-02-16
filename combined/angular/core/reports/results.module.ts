import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { ResultsComponent } from './results.component';
import { FiltersDialogComponent } from './filters-dialog/filters-dialog.component';
import { ReportService } from './services/report.service';
import { SharedModule } from '@app/shared/shared.module';
import { ResultsRoutingModule } from './results-routing.module';
import { ReactiveFormsModule } from '@angular/forms';
import { LnxSearchModule } from '@lnx/search';
import { UiSearchModule } from '@lnx/ui-search';
import { PortalModule } from '@angular/cdk/portal';
import { RemoveSubjectDialogComponent } from '../search/components/remove-subject-dialog/remove-subject-dialog.component';
import { MatSnackBarModule } from '@angular/material/snack-bar';
import { RemoveAlertDialogComponent } from '../search/components/remove-alert-dialog/remove-alert-dialog.component';
import { ReportViewerModule } from './report-viewer/report-viewer.module';
import { PipesModule } from '@app/shared/pipes/pipes.module';

@NgModule({
    declarations: [
        ResultsComponent,
        FiltersDialogComponent,
        RemoveAlertDialogComponent,
        RemoveSubjectDialogComponent
    ],
    imports: [
        SharedModule,
        CommonModule,
        ReactiveFormsModule,
        LnxSearchModule,
        UiSearchModule,
        ResultsRoutingModule,
        PortalModule,
        MatSnackBarModule,
        ReportViewerModule,
        PipesModule
    ],
    exports: [
        ResultsComponent,
        FiltersDialogComponent,
        PipesModule
    ],
    providers: [
        ReportService
    ]
})
export class ResultsModule { }
