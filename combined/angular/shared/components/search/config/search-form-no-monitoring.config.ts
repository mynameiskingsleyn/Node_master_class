import { Validators } from '@angular/forms';
import { STATES } from '@app/core/utils/models/states.model';
import { SearchFormConfigInterface } from '@app/shared/interfaces/search-form.interface';
import { ValidationRules } from '@app/shared/validators/validation-rules';

export const SEARCH_FORM_NO_MONITORING_CONFIG: SearchFormConfigInterface = {
  fields: [
      {
          name: 'first_name',
          label: 'First Name',
          placeholder: '',
          cols: 2,
          rows: 1,
          type: 'text',
          validator: ValidationRules.NAME,
          required: false
      },
      {
          name: 'middle_name',
          label: 'Middle Name',
          placeholder: '',
          cols: 2,
          rows: 1,
          type: 'text',
          validator: ValidationRules.NAME
      },
      {
          name: 'last_name',
          label: 'Last Name',
          placeholder: '',
          cols: 2,
          rows: 1,
          type: 'text',
          validator: ValidationRules.NAME,
          required: false
      },
      {
          name: 'street_address',
          label: 'Street Address',
          placeholder: '',
          cols: 6,
          rows: 1,
          type: 'text',
          validator: ValidationRules.ADDRESS,
          class: 'street-address-input'
      },
      {
          name: 'city',
          label: 'City',
          placeholder: '',
          cols: 2,
          rows: 1,
          type: 'text',
          validator: ValidationRules.CITY
      },
      {
          name: 'state',
          label: 'State',
          placeholder: '',
          cols: 2,
          rows: 1,
          type: 'autocomplete',
          options: STATES,
          validator: ValidationRules.STATE
      },
      {
          name: 'zipcode',
          label: 'ZIP Code',
          placeholder: '',
          cols: 2,
          rows: 1,
          type: 'number',
          hint: '5 digits',
          validator: ValidationRules.ZIPCODE
      },
      {
          name: 'ssn',
          label: 'SSN',
          placeholder: '',
          cols: 2,
          rows: 1,
          type: 'number',
          hint: 'xxxxxxxxx',
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
