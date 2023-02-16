import { Component, OnInit, OnDestroy, ChangeDetectorRef, AfterViewChecked, AfterViewInit } from '@angular/core';
import { Subscription } from 'rxjs';

// components
import { SearchFormComponent } from '../../components/search-form/search-form.component';

@Component({
  selector: 'app-enroll',
  templateUrl: './enroll.component.html',
})
export class EnrollComponent implements OnInit, OnDestroy, AfterViewInit {

  showEnroll: boolean;
  searchFormComponent: SearchFormComponent;
  libSearchSubscription: Subscription;

  constructor(){}

  ngOnInit(){
    this.showEnroll = true;
  }

  ngAfterViewInit(){
    this.searchFormComponent.setEnrollForm();
    this.libSearchSubscription = this.searchFormComponent.searchService.searchChange().subscribe(params => {
      this.searchFormComponent.acceptEnrollDialog(params);
    });

  }


  ngOnDestroy(){
    if(this.libSearchSubscription){
      this.libSearchSubscription.unsubscribe();
    }
  }

  loadedSearchForm(searchFormCompoment) {
    this.searchFormComponent = searchFormCompoment as SearchFormComponent;
    this.searchFormComponent.enrolling = true;
  }

}
