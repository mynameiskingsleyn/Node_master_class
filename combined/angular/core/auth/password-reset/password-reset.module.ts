import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { ReactiveFormsModule } from '@angular/forms';
import { PasswordResetRoutingModule } from './password-reset-routing.module';
import { PASSWORD_RESET_CONFIG } from '../../../config/password-reset.config';
import { LnxPasswordResetModule, LNX_PASSWORD_RESET_CONFIG } from '@lnx/password-reset';
import { LnxUIPasswordResetModule, PasswordResetConfigService } from '@lnx/ui-password-reset';
import { UI_PASSWORD_RESET_CONFIG } from '@app/config/ui-password-reset.config';
import { RecaptchaModule, RECAPTCHA_SETTINGS, RecaptchaSettings } from 'ng-recaptcha';
import { RecaptchaFormsModule } from 'ng-recaptcha';
import { CAPTCHA_SETTINGS } from '@app/config/ui-auth.config';
import { SharedModule } from '@app/shared/shared.module';
import { LayoutModule } from '@core/layout/layout.module';
import { PasswordResetContentComponent } from '@app/containers/components/auth/password-reset-content/password-reset-content.component';


@NgModule({
    declarations: [PasswordResetContentComponent],
    imports: [
        CommonModule,
        SharedModule,
        ReactiveFormsModule,
        RecaptchaModule,
        RecaptchaFormsModule,
        LnxPasswordResetModule.forRoot(PASSWORD_RESET_CONFIG),
        LnxUIPasswordResetModule.forRoot(UI_PASSWORD_RESET_CONFIG),
        PasswordResetRoutingModule,
        LayoutModule
    ],
    providers: [
        {
            provide: LNX_PASSWORD_RESET_CONFIG,
            useValue: PASSWORD_RESET_CONFIG
        },
        {
            provide: PasswordResetConfigService,
            useValue: UI_PASSWORD_RESET_CONFIG
        },
        {
            provide: RECAPTCHA_SETTINGS,
            useValue: CAPTCHA_SETTINGS as RecaptchaSettings,
        }
    ]
})
export class PasswordResetModule { }
