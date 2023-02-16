import { Component } from '@angular/core';
import { SearchActionsAbstract } from '@app/shared/components/search/search-actions-abstract.component';

@Component({
  selector: 'app-registration-actions',
  templateUrl: './registration-actions.component.html',
  styleUrls: ['./registration-actions.component.scss']
})
export class RegistrationActionsComponent extends SearchActionsAbstract {

  constructor() {
    super();
  }

}
