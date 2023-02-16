import { ComponentFixture, TestBed, waitForAsync } from '@angular/core/testing';

import { IISHistoryComponent } from './iis-history.component';

describe('HistoryComponent', () => {
  let component: IISHistoryComponent;
  let fixture: ComponentFixture<IISHistoryComponent>;

  beforeEach(waitForAsync(() => {
    TestBed.configureTestingModule({
      declarations: [ IISHistoryComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(IISHistoryComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
