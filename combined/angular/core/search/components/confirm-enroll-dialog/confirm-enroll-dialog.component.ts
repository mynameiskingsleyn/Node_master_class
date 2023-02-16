import { Component, Inject } from '@angular/core';
import { MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';

@Component({
  selector: 'app-confirm-enroll-dialog',
  templateUrl: './confirm-enroll-dialog.component.html',
  styleUrls: ['./confirm-enroll-dialog.component.sass']
})
export class ConfirmEnrollDialogComponent {

  constructor(
    public dialogRef: MatDialogRef<ConfirmEnrollDialogComponent>,
    @Inject(MAT_DIALOG_DATA) public data: any) {}

  cancelDialog(): void {
    this.dialogRef.close(false);
  }

  acceptEnroll(): void {
      this.dialogRef.close(true);
  }

}
