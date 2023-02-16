import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { LogoutComponent } from '@app/containers/components/auth/logout/logout.component';
import { LogoutRoutingModule } from './logout-routing.module';
import { SharedModule } from '@app/shared/shared.module';

@NgModule({
  declarations: [
      LogoutComponent
    ],
  imports: [
    CommonModule,
    SharedModule,
    LogoutRoutingModule
  ]
})
export class LogoutModule { }
