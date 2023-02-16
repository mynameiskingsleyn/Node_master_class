import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { LayoutSectionComponent } from './components/layout-section/layout-section.component';
import { MaterialModule } from '@app/shared/material/material.module';
import { LayoutBlockComponent } from './components/layout-block/layout-block.component';

@NgModule({
  declarations: [LayoutSectionComponent, LayoutBlockComponent ],
  imports: [
    CommonModule,
    MaterialModule
  ],
  exports: [
    LayoutSectionComponent,
    LayoutBlockComponent
  ]
})
export class ReportsLayoutModule { }
