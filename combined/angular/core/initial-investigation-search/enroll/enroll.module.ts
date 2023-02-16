import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { EnrollComponent } from './components/enroll.component';
import { MainSearchModule } from '../main-search.module';
import { EnrollRoutingModule } from './enroll.routing.module';


@NgModule({
    declarations: [
      EnrollComponent
    ],
    imports: [
        MainSearchModule,
        EnrollRoutingModule
    ],
    exports: [
        MainSearchModule,
        EnrollComponent
    ],
    providers: [
    ]
})
export class EnrollModule { }
