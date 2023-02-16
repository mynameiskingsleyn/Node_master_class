import { Component, Inject, OnInit } from '@angular/core';
import { MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { EnrollDataQualityService } from '@app/shared/services/enroll-data-quality.service';
import { EnrollData } from '@app/core/utils/interfaces/dialog-data.interface';

@Component({
  selector: 'app-confirm-enroll-dialog',
  templateUrl: './confirm-enroll-dialog.component.html',
  styleUrls: ['./confirm-enroll-dialog.component.sass']
})
export class ConfirmEnrollDialogComponent implements OnInit {

  confirmed = false;
  confirmData = null;
  constructor(
    public dialogRef: MatDialogRef<ConfirmEnrollDialogComponent>,
    @Inject(MAT_DIALOG_DATA) public data: EnrollData,
    public dataQualityService: EnrollDataQualityService ) {}

  ngOnInit(){
    this.setUpConfirmData(this.data);
  }

  cancelDialog(): void {
    this.dialogRef.close(false);
  }

  acceptEnroll(): void {
      this.dialogRef.close(true);
  }

  // data quality data
  setUpConfirmData(data): void{
     this.data = data;
     this.confirmData = this.dataQualityService.createConfirmData(data);
   }

}
