import { Component, OnInit, OnDestroy, ChangeDetectorRef, AfterViewChecked } from '@angular/core';
import { Subscription } from 'rxjs';
// components
import { SearchFormComponent } from '../../components/search-form/search-form.component';
// services
import { SearchService } from '../../services/search.service';
import { LnxSearchService } from '@lnx/search';

@Component({
  selector: 'app-search',
  templateUrl: './search.component.html',
})
export class SearchComponent implements OnInit, OnDestroy {

  searchFormComponent: SearchFormComponent;
  libSearchSubscription: Subscription;
  showEnroll: boolean;

  constructor(
    private searchService: LnxSearchService,
    private gqlSearchService: SearchService,

  ) { }

  ngOnInit(){
    this.showEnroll = false;
  }

  loadedSearchForm(searchFormCompoment) {
    this.searchFormComponent = searchFormCompoment as SearchFormComponent;
    this.libSearchSubscription = this.searchFormComponent.searchService.searchReset().subscribe(shouldReset => {
      if (shouldReset) {
        this.searchFormComponent.startNewSearch();

      }
    });

    this.libSearchSubscription = this.searchFormComponent.searchService.searchChange().subscribe(params => {
      this.searchFormComponent.resultSearch = '';
      this.searchFormComponent.loading = true;
      this.searchFormComponent.resultsLoaded = false;

      this.searchFormComponent.searchSubscription = this.searchFormComponent.gqlSearchService.searchReports({
          filters: {
              ...params
          },
      }).subscribe(result => {
          this.searchFormComponent.loading = false;
          if (result.data && result.data.search) {
              if (result.data.search.data && result.data.search.data.length > 0) {
                this.searchFormComponent.results = result.data.search;
                this.searchFormComponent.resultsLoaded = true;
                  } else {
                    this.searchFormComponent.resultsLoaded = false;
                    if (this.searchFormComponent.acceptEnroll(params) && result.data.search.can_enroll) {
                      this.searchFormComponent.enrollDialog();
                    } else {
                      this.searchFormComponent.resultSearch = 'FAIL';
                    }
                  }
              }
          });

    });
  }

  ngOnDestroy(){
    if(this.libSearchSubscription){
      this.libSearchSubscription.unsubscribe();
    }

  }

}
