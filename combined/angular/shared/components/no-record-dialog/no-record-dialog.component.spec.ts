import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { NoRecordDialogComponent } from './no-record-dialog.component';

describe('NoRecordDialogComponent', () => {
  let component: NoRecordDialogComponent;
  let fixture: ComponentFixture<NoRecordDialogComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ NoRecordDialogComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(NoRecordDialogComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
