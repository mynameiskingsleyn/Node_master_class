import { Pipe, PipeTransform } from '@angular/core';
import * as moment from 'moment';

@Pipe({
  name: 'verDate',
})
export class VerDatePipe implements PipeTransform {
  transform(value: any, dateField?: any, format?: any): any {
    const dates = [];
    if (value instanceof Array) {
      value.forEach(element => {
        if (element.hasOwnProperty(dateField)) {

          let parseFormat = 'YYYYMMDD';
          const strDate = element[dateField];

          if (typeof strDate === 'string') {
             if (strDate.length === 6) {
               parseFormat = 'YYYYMM';
               format = 'MM/YYYY';
             }
          }

          const date = moment(strDate, parseFormat);
          if (date.isValid()) {
            dates.push(date);
          }
        }
      });
      return dates.length > 0 ? moment.max(dates).format(format) : '';
    } else {
      const date = moment(value[dateField]);
      return date.isValid() ? date.format(format) : '';
    }
  }
}
