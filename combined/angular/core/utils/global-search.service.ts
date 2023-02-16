import { Injectable } from '@angular/core';
import { Search } from './interfaces/search.interface';

@Injectable({
  providedIn: 'root'
})
export class GlobalSearchService {

  searches: Search[];

  searchFilters = {};

  filters(filters) {
    return this.searchFilters = filters;
  }

  add(search) {
    this.searches.push(search);
    return this;
  }

  remove(search) {
    this.searches.splice(this.searches.indexOf(search), 1);
    return this;
  }

  reset() {
    this.searchFilters = {};
  }
}
