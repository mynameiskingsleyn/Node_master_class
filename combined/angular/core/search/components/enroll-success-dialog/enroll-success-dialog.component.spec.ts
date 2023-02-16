import { ComponentFixture, TestBed, waitForAsync } from '@angular/core/testing';

import { EnrollSuccessDialogComponent } from './enroll-success-dialog.component';

describe('EnrollSuccessDialogComponent', () => {
  let component: EnrollSuccessDialogComponent;
  let fixture: ComponentFixture<EnrollSuccessDialogComponent>;

  beforeEach(waitForAsync(() => {
    TestBed.configureTestingModule({
      declarations: [ EnrollSuccessDialogComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(EnrollSuccessDialogComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
