import { Component, OnInit, Inject } from '@angular/core';
import { MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';

@Component({
  selector: 'app-stop-alert-dialog',
  templateUrl: './stop-alert-dialog.component.html',
  styleUrls: ['./stop-alert-dialog.component.sass']
})
export class StopAlertDialogComponent {

  constructor(
    public dialogRef: MatDialogRef<StopAlertDialogComponent>,
    @Inject(MAT_DIALOG_DATA) public data: any) {}

  cancelDialog(): void {
    this.dialogRef.close(false);
  }

  acceptDialog(): void {
      this.dialogRef.close(true);
  }

}
