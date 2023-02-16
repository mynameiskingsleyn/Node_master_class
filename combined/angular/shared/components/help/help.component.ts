import { Component, Inject } from '@angular/core';
import { APP_CONFIG, IAppConfig } from '@app/config/app.config';

@Component({
  selector: 'app-help',
  templateUrl: './help.component.html',
  styleUrls: ['./help.component.sass']
})
export class HelpComponent {

  constructor(@Inject(APP_CONFIG) public config: IAppConfig) { }

}
