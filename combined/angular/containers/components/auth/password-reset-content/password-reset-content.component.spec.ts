import { ComponentFixture, TestBed, waitForAsync } from '@angular/core/testing';

import { PasswordResetContentComponent } from './password-reset-content.component';

describe('PasswordResetContentComponent', () => {
  let component: PasswordResetContentComponent;
  let fixture: ComponentFixture<PasswordResetContentComponent>;

  beforeEach(waitForAsync(() => {
    TestBed.configureTestingModule({
      declarations: [ PasswordResetContentComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PasswordResetContentComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
