import { Component, Input } from '@angular/core';

let nextElementId = 0;

@Component({
  selector: 'app-layout-element',
  template: '<ng-content></ng-content>',
})
export class LayoutElementComponent<T> {

  readonly id: string = `app-layout-element-${nextElementId++}`;

  @Input() title: string;
  @Input() loading = true;
  @Input() printable = false;
  @Input() expanded: boolean;
  @Input() data: T;
  @Input() index: number;
  @Input() hideHeader = false;

}
