import { ComponentFixture, TestBed, waitForAsync } from '@angular/core/testing';

import { PermittedUseComponent } from './permitted-use.component';

describe('PermittedUseComponent', () => {
  let component: PermittedUseComponent;
  let fixture: ComponentFixture<PermittedUseComponent>;

  beforeEach(waitForAsync(() => {
    TestBed.configureTestingModule({
      declarations: [ PermittedUseComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PermittedUseComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
