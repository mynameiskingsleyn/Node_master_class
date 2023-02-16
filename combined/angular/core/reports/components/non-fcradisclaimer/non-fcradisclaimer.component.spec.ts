import { ComponentFixture, TestBed, waitForAsync } from '@angular/core/testing';

import { NonFCRADisclaimerComponent } from './non-fcradisclaimer.component';

describe('NonFCRADisclaimerComponent', () => {
  let component: NonFCRADisclaimerComponent;
  let fixture: ComponentFixture<NonFCRADisclaimerComponent>;

  beforeEach(waitForAsync(() => {
    TestBed.configureTestingModule({
      declarations: [ NonFCRADisclaimerComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(NonFCRADisclaimerComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
