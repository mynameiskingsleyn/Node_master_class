import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { MainLayoutComponent } from './main-layout/main-layout.component';
import { RouterModule } from '@angular/router';
import { NavigationComponent } from './main-layout/navigation/navigation.component';
import { MainHeaderComponent } from './main-layout/main-header/main-header.component';
import { NotificationsComponent } from './main-layout/notifications/notifications.component';
import { MainFooterComponent } from './main-layout/main-footer/main-footer.component';
import { ProfileComponent } from './main-layout/profile/profile.component';
import { SharedModule } from '@app/shared/shared.module';
import { ExportLayoutComponent } from './export-layout/export-layout.component';
import { LayoutComponent } from './layout/layout.component';
import { MainHelpComponent } from './main-layout/main-help/main-help.component';
import { AuthActionsComponent } from './auth-layout/auth-actions/auth-actions.component';
import { AuthHelpComponent } from '@app/core/auth/auth-help/auth-help.component';

@NgModule({
  declarations: [
    MainLayoutComponent,
    NavigationComponent,
    MainHeaderComponent,
    NotificationsComponent,
    MainFooterComponent,
    ProfileComponent,
    ExportLayoutComponent,
    LayoutComponent,
    AuthHelpComponent,
    MainHelpComponent,
    AuthActionsComponent
  ],
  imports: [
    SharedModule,
    CommonModule,
    RouterModule,
  ],
  exports: [
    MainLayoutComponent,
    AuthHelpComponent,
    MainHelpComponent,
    AuthActionsComponent
  ]
})
export class LayoutModule { }
