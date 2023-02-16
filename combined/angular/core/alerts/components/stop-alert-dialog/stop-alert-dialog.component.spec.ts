import { ComponentFixture, TestBed, waitForAsync } from '@angular/core/testing';

import { StopAlertDialogComponent } from './stop-alert-dialog.component';

describe('StopAlertDialogComponent', () => {
  let component: StopAlertDialogComponent;
  let fixture: ComponentFixture<StopAlertDialogComponent>;

  beforeEach(waitForAsync(() => {
    TestBed.configureTestingModule({
      declarations: [ StopAlertDialogComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(StopAlertDialogComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
