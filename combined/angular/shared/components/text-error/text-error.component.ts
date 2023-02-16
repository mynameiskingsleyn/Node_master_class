import { Component, Input } from '@angular/core';

@Component({
  selector: 'app-text-error',
  templateUrl: './text-error.component.html',
  styleUrls: ['./text-error.component.sass']
})
export class TextErrorComponent {

  @Input() errors: string[];

}
