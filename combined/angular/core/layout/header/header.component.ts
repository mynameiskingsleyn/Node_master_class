import { Component } from '@angular/core';
import { environment } from '@environment';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
})
export class HeaderComponent {

  app = environment.app;

}
