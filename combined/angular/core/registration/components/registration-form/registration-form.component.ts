import { Component, OnChanges, OnInit, SimpleChanges } from '@angular/core';
import { AllowableChars } from '@app/shared/validators/allowable-chars';
import { SearchField, UiSearchComponent } from '@lnx/ui-search';
import {MomentDateAdapter, MAT_MOMENT_DATE_ADAPTER_OPTIONS} from '@angular/material-moment-adapter';
import {DateAdapter, MAT_DATE_FORMATS, MAT_DATE_LOCALE} from '@angular/material/core';

import * as moment from 'moment';

export const FORM_DATE_CONTROLS_FORMATS = {
  parse: {
    dateInput: 'MM/DD/YYYY',
  },
  display: {
    dateInput: 'MM/DD/YYYY',
    monthYearLabel: 'MMM YYYY',
    dateA11yLabel: 'MM/DD/YYYY',
    monthYearA11yLabel: 'MMMM YYYY',
  },
};

@Component({
  selector: 'app-registration-form',
  templateUrl: './registration-form.component.html',
  styleUrls: ['./registration-form.component.sass'],
  providers: [
    {
      provide: DateAdapter,
      useClass: MomentDateAdapter,
      deps: [MAT_DATE_LOCALE, MAT_MOMENT_DATE_ADAPTER_OPTIONS]
    },

    {provide: MAT_DATE_FORMATS, useValue: FORM_DATE_CONTROLS_FORMATS},
  ],
})
export class RegistrationFormComponent extends UiSearchComponent implements OnInit, OnChanges {

  formFields: SearchField[] = [];
  allowableCharsMsg = 'Allowable Characters: ';
  allowableChars = {
    id: this.allowableCharsMsg + AllowableChars.UNIQUEID,
    lexid: this.allowableCharsMsg + AllowableChars.LEXID,
    first_name: this.allowableCharsMsg + AllowableChars.NAME,
    last_name: this.allowableCharsMsg + AllowableChars.NAME,
    middle_name: this.allowableCharsMsg + AllowableChars.NAME,
    street_address: this.allowableCharsMsg + AllowableChars.ADDRESS,
    city: this.allowableCharsMsg + AllowableChars.CITY,
    state: this.allowableCharsMsg + AllowableChars.STATE,
    zipcode: this.allowableCharsMsg + AllowableChars.ZIPCODE,
    ssn: this.allowableCharsMsg + AllowableChars.SSN,
    dob: this.allowableCharsMsg + AllowableChars.DOB
  };

  ngOnChanges(changes: SimpleChanges): void {
    if (changes.hasOwnProperty('filters')) {
      this.formFields = changes.filters.currentValue;
    }
  }

  trackBy(index, item) {
    return item.name;
  }

  getFieldLength(fieldName: string): number {
    switch (fieldName) {
      case 'ssn':
        return 9;
      case 'zipcode':
      case 'zip':
        return 5;
      case 'lexid':
        return 12;
      case 'state':
          return 2;
    }

    return null;
  }

}
