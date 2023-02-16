import { ComponentFixture, TestBed, waitForAsync } from '@angular/core/testing';

import { NoRecordsFoundComponent } from './no-records-found.component';

describe('NoRecordsFoundComponent', () => {
  let component: NoRecordsFoundComponent;
  let fixture: ComponentFixture<NoRecordsFoundComponent>;

  beforeEach(waitForAsync(() => {
    TestBed.configureTestingModule({
      declarations: [ NoRecordsFoundComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(NoRecordsFoundComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
