import { Pipe, PipeTransform } from '@angular/core';
import * as moment from 'moment';

@Pipe({
  name: 'reportDate',
})
export class ReportDatePipe implements PipeTransform {
  transform(value: any, format?: any): any {
    if (!value || value === '0') {
      return '';
    }
    const displayFormat = [];
    let parseFormat = '';
    let year = null;
    let day = null;
    let month = null;
    let dateValue = '';
    const validDateRegExp = /^([0-9]+(\-|\s|\/|:)?){2,10}$/;
    const validYearRegExp = /^([0-9]{2,4})$/;
    const validMonDayRegExp = /^([0-9]{1,2})$/;

    if ((typeof value === 'string' && validDateRegExp.test(value)) || (
      typeof value === 'object' &&  (
              validYearRegExp.test(value.Year) && (
                (validMonDayRegExp.test(value.Month) || value.Month === null) &&
                (validMonDayRegExp.test(value.Day) || value.Day === null )
              )
            )
    )) {
      if (typeof value === 'string') {
        // remove formats
        value = value.replace('/', '').replace('/', '').replace('-', '').replace('-', '');
        // get date parts based in lenght
        year = Number(value.substring(0, 4));
        month = Number(value.substring(4, 6));
        day = Number(value.substring(6, 8));
      } else {

        year = value.Year || null;
        month = value.Month || null;
        day = value.Day || null;
      }

      if (year > 1900) {
        dateValue = year;
        parseFormat += 'YYYY';
      }
      if (month >= 1 && month <= 12) {
        parseFormat += 'MM';
        displayFormat.push('MM');
        if (day >= 1 && day <= 31) {
          parseFormat += 'DD';
          displayFormat.push('DD');
        } else {
          day = 1;
          if (!year) {
            return '';
          }
        }
      } else {
        month = 1;
      }

      // padding 0 to month & day
      dateValue += String(month).padStart(2, '0');
      dateValue += String(day).padStart(2, '0');

      if (year > 1900) {
        displayFormat.push('YYYY');
      }

      // create valid date
      const date = moment(dateValue, parseFormat);
      return date.isValid() ? date.format(format || displayFormat.join('/')) : value;
    }
    return '';
  }
}
