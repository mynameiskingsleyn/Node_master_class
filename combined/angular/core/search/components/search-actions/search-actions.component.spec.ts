import { ComponentFixture, TestBed, waitForAsync } from '@angular/core/testing';

import { SearchActionsComponent } from './search-actions.component';

describe('SearchActionsComponent', () => {
  let component: SearchActionsComponent;
  let fixture: ComponentFixture<SearchActionsComponent>;

  beforeEach(waitForAsync(() => {
    TestBed.configureTestingModule({
      declarations: [ SearchActionsComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(SearchActionsComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
