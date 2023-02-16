import { ComponentFixture, TestBed, waitForAsync } from '@angular/core/testing';
import { ReportHeaderComponent } from './report-header.component';

describe('ReportHeaderComponent', () => {
  let component: ReportHeaderComponent;
  let fixture: ComponentFixture<ReportHeaderComponent>;

  beforeEach(waitForAsync(() => {
    TestBed.configureTestingModule({
      declarations: [ ReportHeaderComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ReportHeaderComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
