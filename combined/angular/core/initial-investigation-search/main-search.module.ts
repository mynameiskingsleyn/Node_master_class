import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
// material
import { MatSnackBarModule } from '@angular/material/snack-bar';
import { MatGridListModule } from '@angular/material/grid-list';
// services
import { ReportService } from '@app/core/reports/services/report.service';
import { SharedModule } from '@app/shared/shared.module';
import { SearchService } from '@app/core/search/services/search.service';
import { ReactiveFormsModule, FormsModule } from '@angular/forms';
import { LnxSearchModule } from '@lnx/search';
import { UiSearchModule } from '@lnx/ui-search';
import { PortalModule } from '@angular/cdk/portal';
import { PipesModule } from '@app/shared/pipes/pipes.module';
import { ResultsModule } from '../reports/results.module';

// components
import { SearchActionsComponent } from './components/search-actions/search-actions.component';
import { SearchFormComponent } from './components/search-form/search-form.component';
import { AdvancedSearchFormComponent } from './components/search-form/advanced-search-form/advanced-search-form.component';
import { ResultsComponent } from './results/results.component';

// dialog components
import { EnrollDialogComponent } from './components/dialogs/enroll-dialog/enroll-dialog.component';
import { RemoveAlertDialogComponent } from './components/dialogs/remove-alert-dialog/remove-alert-dialog.component';
import { ConfirmEnrollDialogComponent } from './components/dialogs/confirm-enroll-dialog/confirm-enroll-dialog.component';
import { RemoveSubjectDialogComponent } from './components/dialogs/remove-subject-dialog/remove-subject-dialog.component';
import { TriggerNonFCRADialogComponent } from './components/dialogs/trigger-non-fcradialog/trigger-non-fcradialog.component';
import { AvailableReportsDialogComponent } from './components/dialogs/available-reports-dialog/available-reports-dialog.component';
import { ConfirmIncorrectDialogComponent } from './components/dialogs/confirm-incorrect-dialog/confirm-incorrect-dialog.component';

@NgModule({
    declarations: [
      SearchFormComponent,
      SearchActionsComponent,
      EnrollDialogComponent,
      RemoveAlertDialogComponent,
      ConfirmEnrollDialogComponent,
      RemoveSubjectDialogComponent,
      AdvancedSearchFormComponent,
      TriggerNonFCRADialogComponent,
      AvailableReportsDialogComponent,
      ConfirmIncorrectDialogComponent,
      ResultsComponent
    ],
    imports: [
        SharedModule,
        CommonModule,
        ReactiveFormsModule,
        FormsModule,
        LnxSearchModule,
        UiSearchModule,
        PortalModule,
        MatSnackBarModule,
        MatGridListModule,
        PipesModule,
        RouterModule
    ],
    exports: [
        PipesModule,
        MatGridListModule,
        SearchFormComponent,
        SearchActionsComponent,
    ],
    providers: [
      ReportService,
      SearchService
    ]
})
export class MainSearchModule { }
