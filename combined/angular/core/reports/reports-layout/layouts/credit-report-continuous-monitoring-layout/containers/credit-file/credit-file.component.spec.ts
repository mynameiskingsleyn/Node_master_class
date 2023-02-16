import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { CreditFileComponent } from './credit-file.component';

describe('CreditFileComponent', () => {
  let component: CreditFileComponent;
  let fixture: ComponentFixture<CreditFileComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ CreditFileComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(CreditFileComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
