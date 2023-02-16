import { ComponentFixture, TestBed, waitForAsync } from '@angular/core/testing';

import { PublicRecordViewComponent } from './public-record-view.component';

describe('PublicRecordViewComponent', () => {
  let component: PublicRecordViewComponent;
  let fixture: ComponentFixture<PublicRecordViewComponent>;

  beforeEach(waitForAsync(() => {
    TestBed.configureTestingModule({
      declarations: [ PublicRecordViewComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(PublicRecordViewComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
