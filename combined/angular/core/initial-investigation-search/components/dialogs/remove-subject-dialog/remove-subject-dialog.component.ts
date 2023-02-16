import { Component, OnInit, Inject } from '@angular/core';
import { MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';

@Component({
  selector: 'app-remove-subject-dialog',
  templateUrl: './remove-subject-dialog.component.html',
  styleUrls: ['./remove-subject-dialog.component.sass']
})
export class RemoveSubjectDialogComponent {

  constructor(
    public dialogRef: MatDialogRef<RemoveSubjectDialogComponent>,
    @Inject(MAT_DIALOG_DATA) public data: {}) {}

  cancelDialog(): void {
    this.dialogRef.close(false);
  }

  acceptDialog(): void {
      this.dialogRef.close(true);
  }

}
