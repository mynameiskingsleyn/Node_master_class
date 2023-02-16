import { Pipe, PipeTransform } from '@angular/core';
import { FormGroup } from '@angular/forms';
import { ValidationMessages } from '../validators/validation-messages';

@Pipe({
  name: 'errorMessage',
  pure: false
})
export class ErrorMessagePipe implements PipeTransform {

    transform(controlName: string, formGroup: FormGroup, field?: string, rules?: any): any {
      return this.getValidationErrorMessage(controlName, formGroup, field, rules);
  }

  getValidationErrorMessage(controlName: string, formGroup: FormGroup, field?: string, msg?: any) {
      const formControl = formGroup.get(controlName);
      if (!formControl || !formControl.invalid || !formControl.dirty || !formControl.touched) {
          return;
      }
      const messages = msg || new ValidationMessages();
      const errors = messages[field || controlName] || null;
      if (errors) {
          for (const error in errors) {
              if (errors.hasOwnProperty(error)) {
                  if (formGroup.get(controlName).hasError(error)) {
                      const errorMsg = errors[error];
                      return errorMsg;
                  }
              }
          }
      }
      return '';
  }


}
