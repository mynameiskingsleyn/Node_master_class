import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { MainLayoutComponent } from '@core/layout/main-layout/main-layout.component';
import { LnxAuthenticationGuard } from '@lnx/authentication';
import { RegistrationGuard } from './shared/guards/registration.guard';
import { PermittedUseGuard } from './shared/guards/permitted-use.guard';
import { ExportLayoutComponent } from './core/layout/export-layout/export-layout.component';
import { MainHelpComponent } from '@core/layout/main-layout/main-help/main-help.component';
import { AclGuard } from './shared/guards/acl.guard';

const routes: Routes = [
  {
    path: '',
    component: MainLayoutComponent,
    canActivateChild: [
      LnxAuthenticationGuard,
      AclGuard,
      PermittedUseGuard,
      RegistrationGuard
    ],
    children: [
      {
        path: 'registration',
        loadChildren: () => import('./core/registration/registration.module').then(m => m.RegistrationModule),
        data: {
          title: 'Registration'
        }
      },
      {
        path: 'my-alerts',
        loadChildren: () => import('./core/alerts/alerts.module').then(m => m.AlertsModule),
        data: {
          title: 'Alerts'
        }
      },
      {
        path: 'reports',
        loadChildren: () => import('./core/reports/results.module').then(m => m.ResultsModule),
        data: {
          title: 'Reports'
        }
      },
      {
        path: 'my-reports',
        loadChildren: () => import('./core/user-reports/user-reports.module').then(m => m.UserReportsModule),
        data: {
          title: 'My Reports'
        }
      },
      {
        path: 'new-report',
        loadChildren: () => import('./core/initial-investigation-search/enroll/enroll.module').then(m => m.EnrollModule),
        data: {
          title: 'New Reports'
        }
      },
      {
        path: 'initial-investigation-search',
        loadChildren: () => import('./core/initial-investigation-search/search/search.module').then(m => m.SearchModule),
        data: {
          title: 'Record Search'
        }
      },
      {
        path: 'search',
        loadChildren: () => import('./core/search/search.module').then(m => m.SearchModule),
        data: {
          title: 'Search'
        }
      },
      {
        path: 'help',
        component: MainHelpComponent,
        data: {
          title: 'Help'
        }
      },
      {
        path: 'change-password',
        loadChildren: () => import('./core/change-password/change-password.module').then(m => m.ChangePasswordModule),
        data: {
          title: 'Change Password'
        }
      },
      {
        path: '',
        redirectTo: '/auth/login',
        pathMatch: 'full',
      }
    ]
  },
  {
    path: 'auth',
    loadChildren: () => import('./core/auth/auth.module').then(m => m.AuthModule)
  },
  {
    path: 'permitted-use-certification',
    component: MainLayoutComponent,
    canActivateChild: [LnxAuthenticationGuard],
    loadChildren: () => import('./core/permitted-use/permitted-use.module').then(m => m.PermittedUseModule),
    data: {
      title: 'Permitted Use Certification'
    }
  },
  {
    path: 'export',
    component: ExportLayoutComponent,
    canActivateChild: [LnxAuthenticationGuard],
    loadChildren: () => import('./shared/export/export.module').then(m => m.ExportModule),
    data: {
      title: 'Export'
    }
  },
  // 404 Not Found redirects to login
  {
    path: '**',
    redirectTo: '/auth/login'
  }
];

@NgModule({
  imports: [
    RouterModule.forRoot(routes, {
    enableTracing: false,
    useHash: true,
    relativeLinkResolution: 'legacy'
})
  ],
  exports: [RouterModule]
})
export class AppRoutingModule {}
