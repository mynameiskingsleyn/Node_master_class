import { Component, Inject } from '@angular/core';
import { environment } from '@environment';
import { APP_CONFIG, IAppConfig } from '@app/config/app.config';

@Component({
  selector: 'app-footer',
  templateUrl: './footer.component.html',
})
export class FooterComponent {

  app = environment.app;
  today: number = Date.now();

  constructor(@Inject(APP_CONFIG) public config: IAppConfig) { }

}
