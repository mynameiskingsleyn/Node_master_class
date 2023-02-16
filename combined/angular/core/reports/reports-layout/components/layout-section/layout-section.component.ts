import { Component } from '@angular/core';
import { LayoutElementComponent } from '../layout-element/layout-element.component';

let nextSectionId = 0;

@Component({
  selector: 'app-layout-section',
  templateUrl: './layout-section.component.html',
  styleUrls: ['./layout-section.component.sass']
})
export class LayoutSectionComponent extends LayoutElementComponent<any> {

  readonly id: string = `app-layout-section-${nextSectionId++}`;

}
