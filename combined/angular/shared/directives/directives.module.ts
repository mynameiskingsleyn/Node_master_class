import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { PopoverDirective } from './popover.directive';
import { AccessDirectivesModule } from './acl/access-directives.module';
import { FocusElementDirective } from './focus-element.directive';
import { EqualValidatorDirective } from './validation/equals-validator.directive';

@NgModule({
  declarations: [
    PopoverDirective,
    FocusElementDirective,
    EqualValidatorDirective
  ],
  imports: [
    CommonModule,
    AccessDirectivesModule
  ],
  exports: [
    PopoverDirective,
    FocusElementDirective,
    AccessDirectivesModule,
    EqualValidatorDirective
  ]
})
export class DirectivesModule { }
