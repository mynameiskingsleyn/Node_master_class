import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CreditReportContinuousMonitoringLayoutComponent } from './credit-report-continuous-monitoring-layout.component';

describe('CreditReportContinuousMonitoringLayoutComponent', () => {
  let component: CreditReportContinuousMonitoringLayoutComponent;
  let fixture: ComponentFixture<CreditReportContinuousMonitoringLayoutComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CreditReportContinuousMonitoringLayoutComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CreditReportContinuousMonitoringLayoutComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
