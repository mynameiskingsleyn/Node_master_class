import { Inject } from '@angular/core';
import { Component, Optional } from '@angular/core';
import { DateFormatsConfig, DATE_FORMATS_CONFIG } from '@app/config/locale.config';
import { LayoutElementComponent } from '@app/core/reports/reports-layout/components/layout-element/layout-element.component';
import { CreditTrades } from '@app/shared/models/reports/credit/credit-trades.model';

@Component({
  selector: 'app-trade',
  templateUrl: './trade.component.html',
  styleUrls: ['./trade.component.sass']
})
export class TradeComponent extends LayoutElementComponent<CreditTrades> {

  collectionsSet = ['Collection', 'CollectionServices'];

  constructor(
    @Optional() @Inject(DATE_FORMATS_CONFIG) public dateFormats: DateFormatsConfig
  ) {
    super();
  }

}
