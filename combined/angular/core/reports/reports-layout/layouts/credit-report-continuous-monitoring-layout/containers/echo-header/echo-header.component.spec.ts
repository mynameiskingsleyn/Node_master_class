import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { EchoHeaderComponent } from './echo-header.component';

describe('EchoHeaderComponent', () => {
  let component: EchoHeaderComponent;
  let fixture: ComponentFixture<EchoHeaderComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ EchoHeaderComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(EchoHeaderComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
