import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { ChangePasswordRoutingModule } from './change-password-routing.module';
import { ChangePasswordComponent } from './change-password/change-password.component';
import { SharedModule } from '@app/shared/shared.module';
import { LnxPasswordResetModule, LNX_PASSWORD_RESET_CONFIG } from '@lnx/password-reset';
import { ReactiveFormsModule } from '@angular/forms';
import { RecaptchaModule, RecaptchaFormsModule } from 'ng-recaptcha';
import { PASSWORD_RESET_CONFIG } from '@app/config/password-reset.config';
import { CAPTCHA_SETTINGS } from '@app/config/ui-auth.config';
import { UI_PASSWORD_CHANGE_CONFIG } from '@app/config/ui-password-reset.config';
import { RECAPTCHA_SETTINGS, RecaptchaSettings } from 'ng-recaptcha';
import { PasswordResetConfigService, LnxUIPasswordResetModule } from '@lnx/ui-password-reset';

@NgModule({
  declarations: [ChangePasswordComponent],
  imports: [
    CommonModule,
    ChangePasswordRoutingModule,
    SharedModule,
    ReactiveFormsModule,
    RecaptchaModule,
    RecaptchaFormsModule,
    LnxPasswordResetModule,
    LnxUIPasswordResetModule
  ],
  providers: [
    {
      provide: LNX_PASSWORD_RESET_CONFIG,
      useValue: PASSWORD_RESET_CONFIG
    },
    {
      provide: PasswordResetConfigService,
      useValue: UI_PASSWORD_CHANGE_CONFIG
    },
    {
      provide: RECAPTCHA_SETTINGS,
      useValue: CAPTCHA_SETTINGS as RecaptchaSettings,
    }
  ]
})
export class ChangePasswordModule { }
