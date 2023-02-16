import { ComponentFixture, TestBed, waitForAsync } from '@angular/core/testing';

import { PublicRecordExpViewComponent } from './public-record-exp-view.component';

describe('PublicRecordExpViewComponent', () => {
  let component: PublicRecordExpViewComponent;
  let fixture: ComponentFixture<PublicRecordViewComponent>;

  beforeEach(waitForAsync(() => {
    TestBed.configureTestingModule({
      declarations: [ PublicRecordViewComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PublicRecordExpViewComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
