import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { CanAccessDirective } from './can-access.directive';
import { ShowCombinedDirective } from './show-combined.directive';

@NgModule({
  declarations: [
    CanAccessDirective,
    ShowCombinedDirective
  ],
  imports: [
    CommonModule
  ],
  exports: [
    CanAccessDirective,
    ShowCombinedDirective
  ]
})
export class AccessDirectivesModule { }
