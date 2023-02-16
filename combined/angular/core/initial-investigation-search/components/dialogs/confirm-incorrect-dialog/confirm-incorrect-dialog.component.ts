import { Component, Inject } from '@angular/core';
import { MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';


@Component({
  selector: 'app-confirm-incorrect-dialog',
  templateUrl: './confirm-incorrect-dialog.component.html',
  styleUrls: ['./confirm-incorrect-dialog.component.sass']
})

export class ConfirmIncorrectDialogComponent {

  constructor(
    public dialogRef: MatDialogRef<ConfirmIncorrectDialogComponent>,
    @Inject(MAT_DIALOG_DATA) public data: any) {}

  cancelDialog(): void {
    this.dialogRef.close(false);
  }

  acceptDialog(): void {
      this.dialogRef.close(true);
  }
}
