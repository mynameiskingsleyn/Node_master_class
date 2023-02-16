import { SearchField } from '@lnx/ui-search';

export interface SearchFormConfigInterface {
  fields: SearchField[];
}

export interface SearchFormInterface {
  startNewSearch(resetValues: boolean): void;
  restoreSearch(): void;
  formFields(): SearchField[];
}
