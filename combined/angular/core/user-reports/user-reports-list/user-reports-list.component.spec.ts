import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { UserReportsListComponent } from './user-reports-list.component';

describe('UserReportsListComponent', () => {
  let component: UserReportsListComponent;
  let fixture: ComponentFixture<UserReportsListComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ UserReportsListComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(UserReportsListComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
