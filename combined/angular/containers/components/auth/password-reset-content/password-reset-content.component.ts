import { Component, AfterViewInit, OnInit } from '@angular/core';
import { PasswordResetComponent } from '@lnx/ui-password-reset';
import { LnxError, LnxErrorCodes, LnxErrorMessages } from '@lnx/core';
import { Validators } from '@angular/forms';
import { ValidationRules } from '@app/shared/validators/validation-rules';
import { ComponentPortal } from '@angular/cdk/portal';

@Component({
  selector: 'app-password-reset-content',
  templateUrl: './password-reset-content.component.html',
  styleUrls: ['./password-reset-content.component.sass']
})
export class PasswordResetContentComponent extends PasswordResetComponent implements OnInit, AfterViewInit {

  public errors: string[] = [];

  passMinLen = 12;

  ngOnInit() {
    this.subscriptions.add(
      this.errorService.onError().subscribe((errorList: LnxError[]) => {
        this.errors = [];
        errorList.forEach((error: LnxError) => {
          if (error.code === LnxErrorCodes.INVALID_LOGIN_ID_OR_PASSWORD ||
            error.code === LnxErrorCodes.MAIL_SEND_ERROR) {
            this.errors.push(error.message);
          } else {
            this.errors.push(LnxErrorMessages.SYSTEM_ERROR);
          }
        });
      })
    );
  }

  ngAfterViewInit() {
    if (this.config.captcha) {
      this.captchaPortal = new ComponentPortal(this.config.captcha);
    }
    setTimeout(() => {
      this.cBootValidation();
      this.viewReady = true;
    });
  }

  /**
   * Initializes the form validations
   */
  cBootValidation() {
    this.resetPasswordForm = this.fb.group({
      username: [null, Validators.compose([Validators.required, Validators.minLength(4)])],
      token: [null, [Validators.required]],
      password: [null, Validators.compose([Validators.required].concat(ValidationRules.PASSVAL))],
      confirmation: [null, [Validators.required]]
    });
  }

}
