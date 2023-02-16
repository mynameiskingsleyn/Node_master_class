import { Component, Input, OnInit } from '@angular/core';
import { LayoutElementComponent } from '../layout-element/layout-element.component';

let nextBlockId = 0;

@Component({
  selector: 'app-layout-block',
  templateUrl: './layout-block.component.html',
  styleUrls: ['./layout-block.component.sass']
})
export class LayoutBlockComponent extends LayoutElementComponent<any> {

  readonly id: string = `app-layout-block-${nextBlockId++}`;

}
