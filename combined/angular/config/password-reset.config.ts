import { environment } from '@environment';
import { LnxPasswordResetConfig } from '@lnx/password-reset';

export const PASSWORD_RESET_CONFIG: LnxPasswordResetConfig = {
  backend: environment.backend,
  api: {
      requestUniqueToken: environment.api + environment.passwordReset.requestUniqueToken,
      resetPassword: environment.api + environment.passwordReset.resetPassword
  },
  graphqlUri: environment.graphqlURI,
  resetPasswordRedirect: environment.auth.loginRedirect
};
