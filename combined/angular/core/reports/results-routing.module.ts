import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { ResultsComponent } from './results.component';
import { ReportViewerComponent } from './report-viewer/report-viewer.component';

const routes: Routes = [
    {
        path: '',
        component: ResultsComponent
    },
    {
        path: ':id',
        component: ReportViewerComponent,
        data: {
          title: 'Report'
        }
    },
    {
      path: 'history/:type/:id',
      component: ReportViewerComponent,
      data: {
        title: 'History Report'
      }
    },
    {
        path: ':type/:id',
        component: ReportViewerComponent,
        data: {
          title: 'Report'
        }
    }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class ResultsRoutingModule { }
