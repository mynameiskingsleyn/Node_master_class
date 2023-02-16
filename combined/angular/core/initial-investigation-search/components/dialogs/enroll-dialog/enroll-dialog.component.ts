import { Component, Inject, OnInit } from '@angular/core';
import { MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';
import { AccountService } from '@app/shared/services/account.service';
import { ProductModuleCodes } from '@app/shared/enums/product-module-codes.enum';

@Component({
  selector: 'app-enroll-dialog',
  templateUrl: './enroll-dialog.component.html',
  styleUrls: ['./enroll-dialog.component.scss']
})
export class EnrollDialogComponent implements OnInit {

  showEnrollMsg = true;

  constructor(
    private accountService: AccountService,
    public dialogRef: MatDialogRef<EnrollDialogComponent>,
    @Inject(MAT_DIALOG_DATA) public data: {}
  ) { }

  ngOnInit(): void {
    // Going forward we must separate all these components to their respective modules (FBI, ICE, ...)
    this.init();
  }

  cancelDialog(): void {
    this.dialogRef.close(false);
  }

  confirmToEnroll(): void {
      this.dialogRef.close(true);
  }

  private init() {
    if (this.accountService.getProductCode() !== ProductModuleCodes.FBI) {
      this.showEnrollMsg = false;
    }
  }

}
