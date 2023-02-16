import { Component, OnInit, AfterViewInit, ComponentFactoryResolver, Inject, Optional } from '@angular/core';
import { PasswordResetComponent, PasswordResetDataBridgeService, PasswordResetConfigService } from '@lnx/ui-password-reset';
import { Validators, FormBuilder } from '@angular/forms';
import { Router } from '@angular/router';
import { LnxPasswordResetService, LnxPasswordResetConfig, LNX_PASSWORD_RESET_CONFIG } from '@lnx/password-reset';
import { LnxAuthenticationAccountService } from '@lnx/authentication';
import { MatDialog } from '@angular/material/dialog';
import { MessageDialogComponent } from '@app/shared/components/message-dialog/message-dialog.component';
import { AclService } from '@app/shared/services/acl/acl.service';
import { LnxErrorHandlerService } from '@lnx/core';
import { ValidationRules } from '@app/shared/validators/validation-rules';

@Component({
  selector: 'app-change-password',
  templateUrl: './change-password.component.html',
  styleUrls: ['./change-password.component.sass']
})
export class ChangePasswordComponent extends PasswordResetComponent implements OnInit, AfterViewInit {

  public errors: string[] = [];

  routeAfter: string;

  passMinLen = 12;

  constructor(
    public fb: FormBuilder,
    public router: Router,
    public passwordResetService: LnxPasswordResetService,
    public dataService: PasswordResetDataBridgeService,
    protected errorService: LnxErrorHandlerService,
    public accountService: LnxAuthenticationAccountService,
    public dialog: MatDialog,
    private aclService: AclService,
    @Inject(LNX_PASSWORD_RESET_CONFIG) public pwdResetConfig: LnxPasswordResetConfig,
    @Optional() public config?: PasswordResetConfigService
  ) {
    super(fb, router, passwordResetService, dataService, errorService, pwdResetConfig, config);
  }

  ngOnInit() {
    this.routeAfter = this.aclService.getModuleRoute();
  }

  ngAfterViewInit() {
    setTimeout(() => {
      this.initForm();
      this.viewReady = true;
    });
  }

  initForm() {
    this.resetPasswordForm = this.fb.group({
      token: [null, Validators.required],
      password: [null, Validators.compose([Validators.required].concat( ValidationRules.PASSVAL))],
      confirmation: [null, [Validators.required]]
    });
  }

  requestResetToken() {
    const account = JSON.parse(this.accountService.get());
    const fullUserName = account.user.userInfo.userName;
    const userName = fullUserName.substr(0, fullUserName.search('@'));
    this.doRequestToken({ value: userName });
  }

  resetPassword(input) {
    const passwordResetInput = {
      token: input.token,
      password: input.password,
      unlockAccount: true,
    };

    this.formSubmitted();
    this.resetPasswordSubscription = this.passwordResetService.reset(passwordResetInput)
      .subscribe(
        result => {
          this.showPasswordStep(false);
          this.dataService.success(result);
          this.formCompleted();
        },
        error => {
          this.formCompleted();
        }
      );
  }

  doPasswordReset(event) {
    if (this.resetPasswordForm.invalid) {
      this.dialog.open(MessageDialogComponent, {
        width: '480px',
        data: {
          message: 'Please make sure both passwords match and meet all the requirements.',
          icon: 'error_outline',
          OK: 'OK'
        }
      });
      event.preventDefault();
    } else {
      this.resetPassword(this.resetPasswordForm.value);
    }
  }

}
