import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ViewNotesDialogComponent } from './view-notes-dialog.component';

describe('ViewNotesDialogComponent', () => {
  let component: ViewNotesDialogComponent;
  let fixture: ComponentFixture<ViewNotesDialogComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ViewNotesDialogComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ViewNotesDialogComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
