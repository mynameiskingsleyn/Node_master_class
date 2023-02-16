export abstract class SearchActionsAbstract {
  searchForm: any;
  loading = false;

  processing(value: boolean = true) {
    this.loading = value;
  }

  submitSearch($event = null) {
    throw new Error('Needs overriding');
  }

  resetSearch($event = null) {
    throw new Error('Needs overriding');
  }
}
