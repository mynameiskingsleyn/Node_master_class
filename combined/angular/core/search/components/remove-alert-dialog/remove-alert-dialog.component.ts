import { Component, OnInit, Inject } from '@angular/core';
import { MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';

@Component({
  selector: 'app-remove-alert-dialog',
  templateUrl: './remove-alert-dialog.component.html',
  styleUrls: ['./remove-alert-dialog.component.sass']
})
export class RemoveAlertDialogComponent {

  constructor(
    public dialogRef: MatDialogRef<RemoveAlertDialogComponent>,
    @Inject(MAT_DIALOG_DATA) public data: any) {}

  cancelDialog(): void {
    this.dialogRef.close(false);
  }

  acceptDialog(): void {
      this.dialogRef.close(true);
  }
}
