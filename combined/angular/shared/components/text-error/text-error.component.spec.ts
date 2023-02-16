import { ComponentFixture, TestBed, waitForAsync } from '@angular/core/testing';

import { TextErrorComponent } from './text-error.component';

describe('TextErrorComponent', () => {
  let component: TextErrorComponent;
  let fixture: ComponentFixture<TextErrorComponent>;

  beforeEach(waitForAsync(() => {
    TestBed.configureTestingModule({
      declarations: [ TextErrorComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(TextErrorComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
