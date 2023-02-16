import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { FlexLayoutModule } from '@angular/flex-layout';
import { HeaderComponent } from '@core/layout/header/header.component';
import { FooterComponent } from '@core/layout/footer/footer.component';
import { AuthLayoutComponent } from '@core/layout/auth-layout/auth-layout.component';
import { AuthRoutingModule } from './auth-routing.module';
import { SharedModule } from '@app/shared/shared.module';
import { LayoutModule } from '@core/layout/layout.module';
@NgModule({
  declarations: [
    HeaderComponent,
    FooterComponent,
    AuthLayoutComponent
  ],
  imports: [
    CommonModule,
    RouterModule,
    SharedModule,
    AuthRoutingModule,
    FlexLayoutModule,
    LayoutModule
  ],
})
export class AuthModule { }
