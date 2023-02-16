import { ComponentFixture, TestBed, waitForAsync } from '@angular/core/testing';

import { AuthActionsComponent } from './auth-actions.component';

describe('AuthActionsComponent', () => {
  let component: AuthActionsComponent;
  let fixture: ComponentFixture<AuthActionsComponent>;

  beforeEach(waitForAsync(() => {
    TestBed.configureTestingModule({
      declarations: [ AuthActionsComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(AuthActionsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
