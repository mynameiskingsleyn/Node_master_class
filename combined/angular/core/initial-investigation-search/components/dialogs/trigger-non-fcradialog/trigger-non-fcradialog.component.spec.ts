import { ComponentFixture, TestBed, waitForAsync } from '@angular/core/testing';

import { TriggerNonFCRADialogComponent } from './trigger-non-fcradialog.component';

describe('TriggerNonFCRADialogComponent', () => {
  let component: TriggerNonFCRADialogComponent;
  let fixture: ComponentFixture<TriggerNonFCRADialogComponent>;

  beforeEach(waitForAsync(() => {
    TestBed.configureTestingModule({
      declarations: [ TriggerNonFCRADialogComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(TriggerNonFCRADialogComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
