import { Directive, ViewContainerRef } from '@angular/core';

@Directive({
  selector: '[appPopover]'
})
export class PopoverDirective {

  constructor(public viewContainerRef: ViewContainerRef) { }

}
