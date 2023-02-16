import { Subscription } from 'rxjs';
import { SearchField } from '@lnx/ui-search';
import { SearchActionsAbstract } from './search-actions-abstract.component';

export abstract class SearchFormAbstract {
  libSearchSubscription: Subscription;
  searchSubscription: Subscription;
  searchStream: Subscription;
  loading = false;
  resultsLoaded = false;
  results: any[] = [];

  resultSearch = '';

  searchActions: any;
  searchForm: any;

  actionsComponent: SearchActionsAbstract;

  fields: SearchField[] = [];
}
