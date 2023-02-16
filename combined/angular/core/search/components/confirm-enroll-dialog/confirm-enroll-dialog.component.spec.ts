import { ComponentFixture, TestBed, waitForAsync } from '@angular/core/testing';

import { ConfirmEnrollDialogComponent } from './confirm-enroll-dialog.component';

describe('ConfirmEnrollDialogComponent', () => {
  let component: ConfirmEnrollDialogComponent;
  let fixture: ComponentFixture<ConfirmEnrollDialogComponent>;

  beforeEach(waitForAsync(() => {
    TestBed.configureTestingModule({
      declarations: [ ConfirmEnrollDialogComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ConfirmEnrollDialogComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
