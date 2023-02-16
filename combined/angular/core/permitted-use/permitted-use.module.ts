import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { PermittedUseComponent } from './components/permitted-use.component';
import { PERMITTED_USE_ROUTES } from './permitted-use.routing';
import { RouterModule } from '@angular/router';
import { MaterialModule } from '@app/shared/material/material.module';
import { SharedModule } from '@app/shared/shared.module';

@NgModule({
  declarations: [PermittedUseComponent],
  imports: [
    CommonModule,
    MaterialModule,
    SharedModule,
    RouterModule.forChild(PERMITTED_USE_ROUTES),
  ]
})
export class PermittedUseModule { }
