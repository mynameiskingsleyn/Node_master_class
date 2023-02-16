import { ComponentFixture, TestBed, waitForAsync } from '@angular/core/testing';

import { RegistrationActionsComponent } from './registration-actions.component';

describe('RegistrationActionsComponent', () => {
  let component: RegistrationActionsComponent;
  let fixture: ComponentFixture<RegistrationActionsComponent>;

  beforeEach(waitForAsync(() => {
    TestBed.configureTestingModule({
      declarations: [ RegistrationActionsComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(RegistrationActionsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
