import { ComponentFixture, TestBed, waitForAsync } from '@angular/core/testing';

import { UniqueidComponent } from './uniqueid.component';

describe('UniqueidComponent', () => {
  let component: UniqueidComponent;
  let fixture: ComponentFixture<UniqueidComponent>;

  beforeEach(waitForAsync(() => {
    TestBed.configureTestingModule({
      declarations: [ UniqueidComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(UniqueidComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
