import { Validators } from '@angular/forms';
import { STATES } from '@app/core/utils/models/states.model';
import { SearchFormConfigInterface } from '@app/shared/interfaces/search-form.interface';
import { ValidationRules } from '@app/shared/validators/validation-rules';

export const REGISTRATION_FORM_CONFIG: SearchFormConfigInterface = {
  fields: [
      {
          name: 'first_name',
          label: 'First Name',
          placeholder: 'First Name',
          cols: 2,
          rows: 1,
          type: 'text',
          validator: ValidationRules.NAME,
          required: true
      },
      {
          name: 'last_name',
          label: 'Last Name',
          placeholder: 'Last Name',
          cols: 2,
          rows: 1,
          type: 'text',
          validator: ValidationRules.NAME,
          required: true
      },
      {
          name: 'middle_name',
          label: 'Middle Name',
          placeholder: 'Middle Name',
          cols: 2,
          rows: 1,
          type: 'text',
          validator: ValidationRules.NAME
      },
      {
          name: 'street_address',
          label: 'Street Address',
          placeholder: 'Street Address',
          cols: 2,
          rows: 1,
          type: 'text',
          required: true,
          validator: ValidationRules.ADDRESS
      },
      {
          name: 'city',
          label: 'City',
          placeholder: 'City',
          cols: 2,
          rows: 1,
          type: 'text',
          required: true,
          validator: ValidationRules.CITY
      },
      {
          name: 'state',
          label: 'State',
          placeholder: 'State',
          cols: 2,
          rows: 1,
          type: 'select',
          options: STATES,
          required: true,
          validator: ValidationRules.STATE
      },
      {
          name: 'zipcode',
          label: 'Zip Code',
          placeholder: 'Zip Code',
          cols: 2,
          rows: 1,
          type: 'number',
          hint: '5 Digits',
          required: true,
          validator: ValidationRules.ZIPCODE
      },
      {
          name: 'ssn',
          label: 'SSN',
          placeholder: 'SSN',
          cols: 2,
          rows: 1,
          type: 'number',
          hint: 'xxxxxxxxx',
          required: true,
          validator: ValidationRules.SSN
      },
      {
          name: 'dob',
          label: 'Date of Birth',
          placeholder: 'Date of Birth',
          cols: 2,
          rows: 1,
          type: 'date',
          hint: 'mm/dd/yyyy',
          validator: ValidationRules.DOB
      }
  ]
};
