import { AfterViewInit, Directive, ElementRef, NgZone } from '@angular/core';

@Directive({
  selector: '[appFocusElement]'
})
export class FocusElementDirective implements AfterViewInit {

  constructor(
    private el: ElementRef,
    private ngZone: NgZone) { }

  ngAfterViewInit(): void {
    this.ngZone.runOutsideAngular(() => {
      window.setTimeout(() => {
        this.el.nativeElement.focus();
        this.ngZone.run(() => true);
      }, 0);
    });
  }
}
