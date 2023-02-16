import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { SearchComponent } from './components/search.component';
import { MainSearchModule } from '../main-search.module';
import { SearchRoutingModule } from './search.routing.module';


@NgModule({
    declarations: [
      SearchComponent
    ],
    imports: [
        MainSearchModule,
        SearchRoutingModule
    ],
    exports: [
        MainSearchModule,
        SearchComponent
    ],
    providers: [
    ]
})
export class SearchModule { }
