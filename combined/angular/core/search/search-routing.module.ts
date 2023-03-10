import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { SearchFormComponent } from './search-form/search-form.component';

const routes: Routes = [
    {
        path: '',
        component: SearchFormComponent
    }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class SearchRoutingModule { }
