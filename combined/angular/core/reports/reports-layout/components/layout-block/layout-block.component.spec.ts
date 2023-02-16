import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { LayoutBlockComponent } from './layout-block.component';

describe('LayoutBlockComponent', () => {
  let component: LayoutBlockComponent;
  let fixture: ComponentFixture<LayoutBlockComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ LayoutBlockComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(LayoutBlockComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
