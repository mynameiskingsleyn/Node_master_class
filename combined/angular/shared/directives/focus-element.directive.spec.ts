import { CUSTOM_ELEMENTS_SCHEMA } from '@angular/core';
import { TestBed } from '@angular/core/testing';
import { ChangePasswordComponent } from '@app/core/change-password/change-password/change-password.component';
import { FocusElementDirective } from './focus-element.directive';

let fixture;

beforeEach(() => {
  fixture = TestBed.configureTestingModule({
    declarations: [ ChangePasswordComponent, FocusElementDirective ],
    schemas:      [ CUSTOM_ELEMENTS_SCHEMA ]
  })
  .createComponent(ChangePasswordComponent);
  fixture.detectChanges();
});

it('should have skyblue <h2>', () => {
  const element: HTMLElement = fixture.nativeElement.querySelector('[name="token"]');

  expect(element).toEqual(fixture.nativeElement.ownerDocument.activeElement);
});