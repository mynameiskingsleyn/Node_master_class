import { ComponentFixture, TestBed, waitForAsync } from '@angular/core/testing';

import { ExportLayoutComponent } from './export-layout.component';

describe('ExportLayoutComponent', () => {
  let component: ExportLayoutComponent;
  let fixture: ComponentFixture<ExportLayoutComponent>;

  beforeEach(waitForAsync(() => {
    TestBed.configureTestingModule({
      declarations: [ ExportLayoutComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ExportLayoutComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
