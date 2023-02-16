import { Component, Inject } from '@angular/core';
import { MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { LnxError } from '@lnx/core';
import { FrontendErrorCodes } from '@app/shared/enums/frontend-error-codes.enum';

export interface ErrorDialogData {
  title: string;
  message?: string;
  errors?: LnxError[];
  icon: string;
  btnText: string;
  codes?: FrontendErrorCodes;
}

@Component({
  selector: 'app-error-dialog',
  templateUrl: './error-dialog.component.html',
  styleUrls: ['./error-dialog.component.sass']
})
export class ErrorDialogComponent {

  constructor(
    public dialogRef: MatDialogRef<ErrorDialogComponent>,
    @Inject(MAT_DIALOG_DATA) public data: ErrorDialogData
  ) {
    this.data.btnText = this.data.btnText || 'OK';
  }

  close(): void {
    this.dialogRef.close(false);
  }
}
