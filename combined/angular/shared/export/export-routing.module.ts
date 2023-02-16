import { Routes } from '@angular/router';
import { ReportExportViewComponent } from './components/report-export-view/report-export-view.component';

export const EXPORT_ROUTES: Routes = [
  {
    path: 'report/:type',
    component: ReportExportViewComponent,
  },
];
