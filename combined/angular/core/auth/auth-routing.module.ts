import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { AuthLayoutComponent } from '@app/core/layout/auth-layout/auth-layout.component';
import { AuthHelpComponent } from '@app/core/auth/auth-help/auth-help.component';
import { LnxAuthenticationGuard } from '@lnx/authentication';

export const AUTH_ROUTES: Routes = [
  {
    path: 'logout',
    canActivate: [LnxAuthenticationGuard],
    loadChildren: () => import('./logout/logout.module').then(m => m.LogoutModule),
    data: {
      title: 'Logout'
    }
  },
  {
    path: '',
    component: AuthLayoutComponent,
    children: [
      {
        path: 'login',
        loadChildren: () => import('./login/login.module').then(m => m.LoginModule),
        data: {
          title: 'Login'
        }
      },
      {
        path: 'forgot-password',
        loadChildren: () => import('./password-reset/password-reset.module').then(m => m.PasswordResetModule),
        data: {
          title: 'Forgot Password'
        }
      },
      {
        path: 'help',
        component: AuthHelpComponent,
        data: {
          title: 'Help'
        }
      },
      {
        path: '', redirectTo: 'login', pathMatch: 'full',
        data: {
          title: 'Login'
        }
      },
    ]
  },
];

@NgModule({
  imports: [RouterModule.forChild(AUTH_ROUTES)],
  exports: [RouterModule]
})
export class AuthRoutingModule { }
