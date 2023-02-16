import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { AlertsComponent } from './alerts.component';
import { AlertsRoutingModule } from './alerts-routing.module';
import { SharedModule } from '@app/shared/shared.module';
import { AlertsListComponent } from './list/alerts-list.component';
import { MatSnackBarModule } from '@angular/material/snack-bar';
import { StopAlertDialogComponent } from './components/stop-alert-dialog/stop-alert-dialog.component';
import { RemoveSubjectDialogComponent } from './components/remove-subject-dialog/remove-subject-dialog.component';

@NgModule({
    declarations: [
        AlertsComponent,
        AlertsListComponent,
        StopAlertDialogComponent,
        RemoveSubjectDialogComponent
    ],
    imports: [
        CommonModule,
        SharedModule,
        AlertsRoutingModule,
        MatSnackBarModule
    ]
})
export class AlertsModule { }
