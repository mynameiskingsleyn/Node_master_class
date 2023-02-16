import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { MapFieldPipe } from './reports/map-field.pipe';
import { VerDatePipe } from './reports/ver-date.pipe';
import { ReportDatePipe } from './reports/report-date.pipe';
import { ErrorMessagePipe } from './error-message.pipe';

@NgModule({
  declarations: [
    MapFieldPipe,
    VerDatePipe,
    ReportDatePipe,
    ErrorMessagePipe
  ],
  imports: [
    CommonModule
  ],
  exports: [
    MapFieldPipe,
    VerDatePipe,
    ReportDatePipe,
    ErrorMessagePipe
  ]
})
export class PipesModule { }
