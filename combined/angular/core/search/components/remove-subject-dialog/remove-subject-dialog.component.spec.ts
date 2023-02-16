import { ComponentFixture, TestBed, waitForAsync } from '@angular/core/testing';

import { RemoveSubjectDialogComponent } from './remove-subject-dialog.component';

describe('RemoveSubjectDialogComponent', () => {
  let component: RemoveSubjectDialogComponent;
  let fixture: ComponentFixture<RemoveSubjectDialogComponent>;

  beforeEach(waitForAsync(() => {
    TestBed.configureTestingModule({
      declarations: [ RemoveSubjectDialogComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(RemoveSubjectDialogComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
