import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { SearchRoutingModule } from './search-routing.module';
import { LnxSearchModule } from '@lnx/search';
import { UiSearchModule } from '@lnx/ui-search';
import { SharedModule } from '@app/shared/shared.module';
import { SearchActionsComponent } from './components/search-actions/search-actions.component';
import { SearchFormComponent } from './search-form/search-form.component';
import { ResultsModule } from '../reports/results.module';
import { PortalModule } from '@angular/cdk/portal';
import { EnrollDialogComponent } from './components/enroll-dialog/enroll-dialog.component';
import { SearchFiltersComponent } from './components/search-filters/search-filters.component';
import { ReactiveFormsModule, FormsModule } from '@angular/forms';
import { ConfirmEnrollDialogComponent } from './components/confirm-enroll-dialog/confirm-enroll-dialog.component';
import { EnrollSuccessDialogComponent } from './components/enroll-success-dialog/enroll-success-dialog.component';
import { TriggerNonFCRADialogComponent } from './components/trigger-non-fcradialog/trigger-non-fcradialog.component';
import { AdvancedSearchFormComponent } from './components/advanced-search-form/advanced-search-form.component';

@NgModule({
    declarations: [
        SearchFormComponent,
        SearchActionsComponent,
        EnrollDialogComponent,
        SearchFiltersComponent,
        ConfirmEnrollDialogComponent,
        EnrollSuccessDialogComponent,
        TriggerNonFCRADialogComponent,
        AdvancedSearchFormComponent
    ],
    imports: [
        CommonModule,
        SharedModule,
        ReactiveFormsModule,
        FormsModule,
        LnxSearchModule,
        UiSearchModule,
        SearchRoutingModule,
        ResultsModule,
        PortalModule
    ],
    exports: [
        SearchFormComponent,
        SearchActionsComponent,
        EnrollDialogComponent,
        SearchFiltersComponent
    ]
})
export class SearchModule { }
