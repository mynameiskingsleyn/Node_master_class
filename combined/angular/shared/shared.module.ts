import { NgModule } from '@angular/core';
import { MaterialModule } from '@material/material.module';
import { FlexLayoutModule } from '@angular/flex-layout';
import { SubmenuComponent } from '@app/shared/components/sub-menu/submenu.component';
import { HistoryComponent } from './components/history/history.component';
import { IISHistoryComponent } from './components/iis-history/iis-history.component';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { PopoverComponent } from './components/popover/popover.component';
import { SubjectInfoComponent } from './components/subject-info/subject-info.component';
import { PortalModule } from '@angular/cdk/portal';
import { TextErrorComponent } from './components/text-error/text-error.component';
import { NoRecordsFoundComponent } from './components/no-records-found/no-records-found.component';
import { ExportModule } from './export/export.module';
import { PipesModule } from './pipes/pipes.module';
import { UniqueidComponent } from './components/uniqueid/uniqueid.component';
import { HelpComponent } from './components/help/help.component';
import { MessageDialogComponent } from './components/message-dialog/message-dialog.component';
import { TitleService } from './services/title.service';
import { DirectivesModule } from './directives/directives.module';
import { ColumnDefinitionsService } from './services/column-definitions.service';
import { NoRecordDialogComponent } from './components/no-record-dialog/no-record-dialog.component';
import { AddNoteDialogComponent } from './components/add-note-dialog/add-note-dialog.component';
import { ReactiveFormsModule } from '@angular/forms';
import { ViewNotesDialogComponent } from './components/view-notes-dialog/view-notes-dialog.component';
import { ErrorDialogComponent } from './components/error-dialog/error-dialog.component';
import { FiltersDialogComponent } from './components/filters-dialog/filters-dialog.component';

/**
 * Resources shared across the whole application
 */
@NgModule({
    declarations: [
        SubmenuComponent,
        HistoryComponent,
        IISHistoryComponent,
        PopoverComponent,
        SubjectInfoComponent,
        TextErrorComponent,
        NoRecordsFoundComponent,
        UniqueidComponent,
        HelpComponent,
        MessageDialogComponent,
        NoRecordDialogComponent,
        AddNoteDialogComponent,
        ViewNotesDialogComponent,
        ErrorDialogComponent,
        FiltersDialogComponent
    ],
    imports: [
        CommonModule,
        RouterModule,
        PortalModule,
        FlexLayoutModule,
        MaterialModule,
        PipesModule,
        ExportModule,
        DirectivesModule,
        ReactiveFormsModule
    ],
    exports: [
        FlexLayoutModule,
        MaterialModule,
        PortalModule,
        ExportModule,
        SubmenuComponent,
        HistoryComponent,
        IISHistoryComponent,
        PopoverComponent,
        SubjectInfoComponent,
        TextErrorComponent,
        NoRecordsFoundComponent,
        UniqueidComponent,
        PipesModule,
        HelpComponent,
        MessageDialogComponent,
        DirectivesModule,
        NoRecordDialogComponent,
        AddNoteDialogComponent,
        ViewNotesDialogComponent,
        ErrorDialogComponent,
        FiltersDialogComponent
    ],
    providers: [
        TitleService,
        ColumnDefinitionsService
    ]
})
export class SharedModule { }
