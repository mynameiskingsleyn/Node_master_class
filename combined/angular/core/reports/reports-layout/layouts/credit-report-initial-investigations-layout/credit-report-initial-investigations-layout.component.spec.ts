import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CreditReportInitialInvestigationsLayoutComponent } from './credit-report-initial-investigations-layout.component';

describe('CreditReportInitialInvestigationsLayoutComponent', () => {
  let component: CreditReportInitialInvestigationsLayoutComponent;
  let fixture: ComponentFixture<CreditReportInitialInvestigationsLayoutComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CreditReportInitialInvestigationsLayoutComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CreditReportInitialInvestigationsLayoutComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
