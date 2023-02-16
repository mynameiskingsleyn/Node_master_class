import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { LayoutElementComponent } from './layout-element.component';

describe('LayoutElementComponent', () => {
  let component: LayoutElementComponent<any>;
  let fixture: ComponentFixture<LayoutElementComponent<any>>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ LayoutElementComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(LayoutElementComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
