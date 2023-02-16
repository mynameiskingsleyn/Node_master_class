import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { UserReportsComponent } from './user-reports/user-reports.component';
import { UserReportsRoutingModule } from './user-reports-routing.module';
import { UserReportsListComponent } from './user-reports-list/user-reports-list.component';
import { SharedModule } from '@app/shared/shared.module';

@NgModule({
  declarations: [UserReportsComponent, UserReportsListComponent],
  imports: [
    CommonModule,
    SharedModule,
    UserReportsRoutingModule,
  ]
})
export class UserReportsModule { }
