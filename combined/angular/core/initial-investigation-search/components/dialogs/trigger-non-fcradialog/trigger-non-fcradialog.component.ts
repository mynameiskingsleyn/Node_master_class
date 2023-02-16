import { Component, Inject } from '@angular/core';
import { MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';

@Component({
  selector: 'app-trigger-non-fcradialog',
  templateUrl: './trigger-non-fcradialog.component.html',
  styleUrls: ['./trigger-non-fcradialog.component.sass']
})
export class TriggerNonFCRADialogComponent {

  reasons: { description: string; selected: boolean }[] = [
    {description: 'Discovered or reported financial concerns', selected: false },
    {description: 'Discovered or reported criminal or sex offender activity', selected: false },
    {description: 'Discovered or reported potential Insider Threat Program risks', selected: false }
  ];

  constructor(
    public dialogRef: MatDialogRef<TriggerNonFCRADialogComponent>,
    @Inject(MAT_DIALOG_DATA) public data: {}) {}

  cancel(): void {
    this.dialogRef.close(false);
  }

  submit(): void {
    this.dialogRef.close(this.reasons);
  }

}
