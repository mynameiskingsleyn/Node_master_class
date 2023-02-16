import { environment } from '@environment';
import { RecaptchaComponent } from 'ng-recaptcha';
import { PasswordResetContentComponent } from '@app/containers/components/auth/password-reset-content/password-reset-content.component';

export const UI_PASSWORD_RESET_CONFIG = {
  content: PasswordResetContentComponent,
  captchaRequired: environment.captcha.required,
  captcha: RecaptchaComponent,
  captchaResolver: environment.ui.auth.captchaResolver
};

export const UI_PASSWORD_CHANGE_CONFIG = {
  captchaRequired: false,
};
