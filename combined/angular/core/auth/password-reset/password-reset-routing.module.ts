import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { PasswordResetComponent } from '@lnx/ui-password-reset';

const routes: Routes = [
    {
      path: '',
      component: PasswordResetComponent
    }
  ];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class PasswordResetRoutingModule { }
