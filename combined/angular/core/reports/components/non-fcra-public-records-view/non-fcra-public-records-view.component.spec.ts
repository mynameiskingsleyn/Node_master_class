import { ComponentFixture, TestBed, waitForAsync } from '@angular/core/testing';

import { NonFcraPublicRecordsViewComponent } from './non-fcra-public-records-view.component';

describe('NonFcraPublicRecordsViewComponent', () => {
  let component: NonFcraPublicRecordsViewComponent;
  let fixture: ComponentFixture<NonFcraPublicRecordsViewComponent>;

  beforeEach(waitForAsync(() => {
    TestBed.configureTestingModule({
      declarations: [ NonFcraPublicRecordsViewComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(NonFcraPublicRecordsViewComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
