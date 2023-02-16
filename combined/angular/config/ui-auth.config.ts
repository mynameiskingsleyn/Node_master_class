import { environment } from '@environment';
import { RecaptchaComponent, RecaptchaSettings } from 'ng-recaptcha';
import { LoginContentComponent } from '@app/containers/components/auth/login-content/login-content.component';

export const UI_AUTH_CONFIG = {
    content: LoginContentComponent,
    captchaRequired: environment.captcha.required,
    captcha: RecaptchaComponent,
    captchaResolver: environment.ui.auth.captchaResolver
};

export const CAPTCHA_SETTINGS: RecaptchaSettings = {
    siteKey: environment.captcha.key,
    theme: environment.captcha.theme as ReCaptchaV2.Theme
};
