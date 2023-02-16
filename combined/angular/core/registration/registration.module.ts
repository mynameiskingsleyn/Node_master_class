import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { MaterialModule } from '@app/shared/material/material.module';
import { SharedModule } from '@app/shared/shared.module';
import { RegistrationComponent } from './components/registration.component';
import { REGISTRATION_ROUTES } from './registration.routing';
import { RegistrationActionsComponent } from './components/registration-actions/registration-actions.component';
import { LnxSearchModule } from '@lnx/search';
import { UiSearchModule } from '@lnx/ui-search';
import { RegistrationFormComponent } from './components/registration-form/registration-form.component';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';

@NgModule({
    declarations: [
        RegistrationComponent,
        RegistrationActionsComponent,
        RegistrationFormComponent
    ],
    imports: [
        CommonModule,
        ReactiveFormsModule,
        FormsModule,
        MaterialModule,
        SharedModule,
        RouterModule.forChild(REGISTRATION_ROUTES),
        LnxSearchModule,
        UiSearchModule,
    ]
})
export class RegistrationModule { }
