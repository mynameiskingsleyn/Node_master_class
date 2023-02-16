import { AfterViewInit, Component, Inject, OnDestroy, OnInit, QueryList, ViewChildren } from '@angular/core';
import { FormGroup } from '@angular/forms';
import { MatPaginator } from '@angular/material/paginator';
import { MatDialog, MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { AgencyNotesDataSource } from '@app/core/reports/agency-notes-datasource';
import { ReportService } from '@app/core/reports/services/report.service';
import { ReportType } from '@app/core/utils/reports/report-type.enum';
import { Subscription } from 'rxjs';
import { AddNoteDialogComponent } from '../add-note-dialog/add-note-dialog.component';
import { MessageDialogComponent } from '../message-dialog/message-dialog.component';

@Component({
  selector: 'app-view-notes-dialog',
  templateUrl: './view-notes-dialog.component.html',
  styleUrls: ['./view-notes-dialog.component.scss']
})
export class ViewNotesDialogComponent implements OnInit, OnDestroy, AfterViewInit {

  subscription: Subscription = new Subscription();
  loading = false;
  datasource: AgencyNotesDataSource;
  displayedColumns = ['type', 'notes', 'actions'];
  @ViewChildren(MatPaginator) paginators!: QueryList<MatPaginator>;

  constructor(
    public dialogRef: MatDialogRef<ViewNotesDialogComponent>,
    public reportService: ReportService,
    public dialog: MatDialog,
    @Inject(MAT_DIALOG_DATA) public data: any) {
      this.datasource = new AgencyNotesDataSource(null);
      this.datasource.paginators = this.paginators;
  }

  ngOnInit() {
    this.loading = true;
  }

  ngAfterViewInit() {
    this.loadNotes();
  }

  loadNotes() {
    this.datasource.paginators = this.paginators;
    this.subscription.add(
      this.reportService.agencyNotes(this.data.reports).subscribe((data) => {
        if (data.data && data.data.agencyNotes) {
            this.datasource.setData({
                data: data.data.agencyNotes,
                total: data.data.agencyNotes.length
            }, null);
            this.loading = false;
        }
      })
    );
  }

  reportTitle(type: string) {
    let reportTitle = null;
    switch (type.toLowerCase()) {
      case ReportType.PUBLIC_RECORD:
        reportTitle = 'Public Records';
        break;
      case ReportType.CREDIT_REPORT:
        reportTitle = 'Credit Report';
        break;
      case ReportType.NONFCRA_REPORT:
        reportTitle = 'Non-FCRA Public Records';
        break;
    }

    return reportTitle;
  }

  ngOnDestroy() {
    this.subscription.unsubscribe();
  }

  editNote(note) {
    this.dialog.closeAll();
    this.dialog.open(AddNoteDialogComponent, {
      id: 'agency-note-dialog',
      width: '680px',
      height: '300px',
      data: {
        ...this.getNoteDialogData(note)
      }
    });
  }

  deleteNote(note) {
    const confirmDialogRef = this.dialog.open(MessageDialogComponent, {
      hasBackdrop: true,
      data: {
        title: 'Delete Note Confirmation',
        message: 'Are you sure you want to delete the note?',
        OK: 'Yes',
        CANCEL: 'No',
      }
    });
    this.subscription.add(
      confirmDialogRef.afterClosed().subscribe(confirmation => {
        if (confirmation) {
          this.datasource = new AgencyNotesDataSource(null);
          this.loading = true;
          this.subscription.add(
            this.reportService.deleteAgencyNote(note.reportId, note.type).subscribe(() => {
              this.loadNotes();
            },
            (error) => {
              // TODO: Log error to new logging service
              this.loadNotes();
            })
          );
        }
      })
    );
  }

  private getNoteDialogData(note) {
    const noteDialogData = {
      type: note.type.toLowerCase(),
      report: this.data
    };
    if (note.notes) {
      return {
        title: 'Edit Agency Note',
        note: note.notes,
        ...noteDialogData
      };
    } else {
      return {
        title: 'Add Agency Note',
        ...noteDialogData
      };
    }
  }
}
