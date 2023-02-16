import { ComponentFixture, TestBed, waitForAsync } from '@angular/core/testing';

import { CreditReportViewComponent } from './credit-report-view.component';

describe('CreditReportViewComponent', () => {
  let component: CreditReportViewComponent;
  let fixture: ComponentFixture<CreditReportViewComponent>;

  beforeEach(waitForAsync(() => {
    TestBed.configureTestingModule({
      declarations: [ CreditReportViewComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CreditReportViewComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
