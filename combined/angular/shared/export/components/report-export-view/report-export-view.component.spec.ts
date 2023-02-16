import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ReportExportViewComponent } from './report-export-view.component';

describe('ReportExportViewComponent', () => {
  let component: ReportExportViewComponent;
  let fixture: ComponentFixture<ReportExportViewComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ReportExportViewComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ReportExportViewComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
