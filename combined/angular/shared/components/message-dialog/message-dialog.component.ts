import { Component, Inject } from '@angular/core';
import { MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';

export interface DialogData {
  title: string;
  message: string;
  icon: string;
  loading: boolean;
  OK: string;
  ACCEPT: string;
  CANCEL: string;
}

@Component({
  selector: 'app-message-dialog',
  templateUrl: './message-dialog.component.html',
  styleUrls: ['./message-dialog.component.sass']
})
export class MessageDialogComponent {

  constructor(
    public dialogRef: MatDialogRef<MessageDialogComponent>,
    @Inject(MAT_DIALOG_DATA) public data: DialogData
  ) { }

  cancel(): void {
    this.dialogRef.close(false);
  }

  ok(): void {
    this.accept();
  }

  accept(): void {
    this.dialogRef.close(true);
  }

}
