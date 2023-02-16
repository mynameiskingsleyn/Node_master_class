import { Component, OnInit } from '@angular/core';
import { LoginComponent } from '@lnx/ui-authentication';
import { LnxError, LnxErrorCodes, LnxErrorMessages } from '@lnx/core';

@Component({
  selector: 'app-login-content',
  templateUrl: './login-content.component.html'
})
export class LoginContentComponent extends LoginComponent implements OnInit {

  public errors: string[] = [];

  ngOnInit() {
    this.subscriptions.add(
      this.errorService.onError().subscribe((errorList: LnxError[]) => {
        this.errors = [];
        errorList.forEach((error: LnxError) => {
          if (error.code === LnxErrorCodes.INVALID_LOGIN_ID_OR_PASSWORD ||
            error.code === LnxErrorCodes.INVALID_IP) {
            this.errors.push(error.message);
          } else {
            this.errors.push(LnxErrorMessages.SYSTEM_ERROR);
          }
        });
      })
    );
  }
}
