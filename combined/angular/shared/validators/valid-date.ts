
import { AbstractControl, ValidationErrors, ValidatorFn } from '@angular/forms';
import * as moment from 'moment';

export function validDate(format: string = null): ValidatorFn {
  return (control: AbstractControl): ValidationErrors | null => {
    if (!control || !control.value) {
      return null;
    }
    const date = moment(control.value, format);
    const year = String(date.year());

    return date.isValid() &&  year.length === 4 ? null : { validDate: {value: control.value} };
  };
}

