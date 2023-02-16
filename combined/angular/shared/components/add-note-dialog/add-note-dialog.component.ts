import { Component, Inject, OnDestroy, OnInit } from '@angular/core';
import { MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { Subscription } from 'rxjs';
import { FormGroup, FormControl, AbstractControl, Validators } from '@angular/forms';
import { ReportService } from '@app/core/reports/services/report.service';
import { ReportType } from '@app/core/utils/reports/report-type.enum';

@Component({
  selector: 'app-add-note-dialog',
  templateUrl: './add-note-dialog.component.html',
  styleUrls: ['./add-note-dialog.component.sass']
})
export class AddNoteDialogComponent implements OnInit, OnDestroy {

  maxLength = 50;

  subscription: Subscription = new Subscription();

  notesControl: AbstractControl = new FormControl('', [Validators.required, Validators.minLength(2)]);

  agencyNotesForm = new FormGroup({
    note: this.notesControl,
  });

  submitting = false;

  constructor(
    public dialogRef: MatDialogRef<AddNoteDialogComponent>,
    public reportService: ReportService,
    @Inject(MAT_DIALOG_DATA) public data: any) {
  }

  ngOnInit() {
    if (this.data.note) {
      this.notesControl.setValue(this.data.note);
      this.notesControl.updateValueAndValidity();
    }
  }

  cancel(): void {
    this.dialogRef.close(false);
  }


  onSubmit() {
    this.submitAddNote();
  }

  public get notes() {
    return this.notesControl.value;
  }


  remainingChars() {
    const length = this.agencyNotesForm.get('note').value.length;
    if (length > 0 && length < this.maxLength) {
      return -this.maxLength - -length;
    }
    return '';
  }

  getReportId() {
    const reportType = this.data.type;
    let reportId = null;
    switch (reportType) {
      case ReportType.PUBLIC_RECORD:
        reportId = this.data.report.pr_id;
        break;
      case ReportType.CREDIT_REPORT:
        reportId = this.data.report.cr_id;
        break;
      case ReportType.NONFCRA_REPORT:
        reportId = this.data.report.nr_id;
        break;
    }

    return reportId;
  }

  getReportTitle() {
    const reportType = this.data.type;
    let reportTitle = null;
    switch (reportType) {
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

  getReportDate() {
    const reportType = this.data.type;
    let reportDate = null;
    switch (reportType) {
      case ReportType.PUBLIC_RECORD:
        reportDate = this.data.report.max_pr_date;
        break;
      case ReportType.CREDIT_REPORT:
        reportDate = this.data.report.max_cr_date;
        break;
      case ReportType.NONFCRA_REPORT:
        reportDate = this.data.report.max_nr_date;
        break;
    }

    return reportDate;
  }

  submitAddNote() {
    this.submitting = true;
    this.subscription.add(
      this.reportService.addAgencyNote(this.notes, this.getReportId(), this.data.type).subscribe(() => {
        this.submitting = false;
        this.dialogRef.close(true);
      },
      (error) => {
        // TODO: capture logs
        this.dialogRef.close();
      })
    );
  }

  ngOnDestroy() {
    this.subscription.unsubscribe();
  }

}
