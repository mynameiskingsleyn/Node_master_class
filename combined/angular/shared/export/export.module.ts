import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { MaterialModule } from '../material/material.module';
import { PortalModule } from '@angular/cdk/portal';
import { ReportViewerModule } from '@app/core/reports/report-viewer/report-viewer.module';
import { EXPORT_ROUTES } from './export-routing.module';
import { ExportService } from '../services/export.service';
import { PipesModule } from '@shared/pipes/pipes.module';
import { ReportService } from '@app/core/reports/services/report.service';
import { DirectivesModule } from '@shared/directives/directives.module';
import { ReportExportViewComponent } from './components/report-export-view/report-export-view.component';

@NgModule({
  declarations: [
    ReportExportViewComponent
  ],
  imports: [
    CommonModule,
    RouterModule,
    PortalModule,
    MaterialModule,
    ReportViewerModule,
    RouterModule.forChild(EXPORT_ROUTES),
    PipesModule,
    DirectivesModule
  ],
  providers: [
    ExportService,
    ReportService
  ]
})
export class ExportModule { }
