import { ComponentFixture, TestBed, waitForAsync } from '@angular/core/testing';

import { MainHelpComponent } from './main-help.component';

describe('MainHelpComponent', () => {
  let component: MainHelpComponent;
  let fixture: ComponentFixture<MainHelpComponent>;

  beforeEach(waitForAsync(() => {
    TestBed.configureTestingModule({
      declarations: [ MainHelpComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(MainHelpComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
