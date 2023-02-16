import { Component, OnInit, Inject } from '@angular/core';
import { MatDialogRef } from '@angular/material/dialog';
import { APP_CONFIG, IAppConfig } from '@app/config/app.config';
import { AccountService } from '@app/shared/services/account.service';
import { ProductModuleCodes } from '@app/shared/enums/product-module-codes.enum';

@Component({
  selector: 'app-enroll-success-dialog',
  templateUrl: './enroll-success-dialog.component.html',
  styleUrls: ['./enroll-success-dialog.component.sass']
})
export class EnrollSuccessDialogComponent implements OnInit {

  showEnrollMsg = true;

  constructor(
    private accountService: AccountService,
    @Inject(APP_CONFIG) public config: IAppConfig,
    public dialogRef: MatDialogRef<EnrollSuccessDialogComponent>
  ) { }

  ngOnInit() {
    // Going forward we must separate all these components to their respective modules (FBI, ICE, ...)
    this.init();
  }

  closeDialog() {
    this.dialogRef.close(true);
  }

  private init() {
    if (this.accountService.getProductCode() !== ProductModuleCodes.FBI) {
      this.showEnrollMsg = false;
    }
  }

}
