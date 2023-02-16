import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FlexLayoutModule } from '@angular/flex-layout';
import { LoginRoutingModule } from './login-routing.module';
import { ReactiveFormsModule } from '@angular/forms';
import { RecaptchaFormsModule } from 'ng-recaptcha';
import { LnxUIAuthModule, LoginConfigService } from '@lnx/ui-authentication';
import { RecaptchaModule, RECAPTCHA_SETTINGS, RecaptchaSettings } from 'ng-recaptcha';
import { UI_AUTH_CONFIG, CAPTCHA_SETTINGS } from '@app/config/ui-auth.config';
import { MaterialModule } from '@app/shared/material/material.module';
import { SharedModule } from '@app/shared/shared.module';
import { LayoutModule } from '@core/layout/layout.module';
import { LoginContentComponent } from '@app/containers/components/auth/login-content/login-content.component';

@NgModule({
    declarations: [
        LoginContentComponent
    ],
    imports: [
        CommonModule,
        ReactiveFormsModule,
        SharedModule,
        RecaptchaModule,
        RecaptchaFormsModule,
        MaterialModule,
        LnxUIAuthModule.forRoot(UI_AUTH_CONFIG),
        LoginRoutingModule,
        FlexLayoutModule,
        LayoutModule
    ],
    providers: [
        {
            provide: LoginConfigService,
            useValue: UI_AUTH_CONFIG
        },
        {
            provide: RECAPTCHA_SETTINGS,
            useValue: CAPTCHA_SETTINGS as RecaptchaSettings,
        }
    ]
})
export class LoginModule { }
