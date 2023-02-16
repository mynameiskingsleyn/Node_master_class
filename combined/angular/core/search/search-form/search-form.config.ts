import { Validators } from '@angular/forms';
import { STATES } from '@app/core/utils/models/states.model';
import { ValidationRules } from '@app/shared/validators/validation-rules';
import { SearchFormConfigInterface } from '@app/shared/interfaces/search-form.interface';

export const SEARCH_FORM_CONFIG: SearchFormConfigInterface = {
  fields: [
      {
        name: 'id',
        label: 'Unique ID',
        placeholder: '',
        cols: 2,
        rows: 1,
        type: 'text',
        validator: ValidationRules.UNIQUEID
      },
      {
          name: 'lexid',
          label: 'LexID',
          placeholder: '',
          cols: 2,
          rows: 1,
          type: 'number',
          validator: ValidationRules.LEXID
      },
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
          name: 'middle_name',
          label: 'Middle Name',
          placeholder: '',
          cols: 2,
          rows: 1,
          type: 'text',
          validator: ValidationRules.NAME
      },
      {
          name: 'street_address',
          label: 'Street Address',
          placeholder: '',
          cols: 2,
          rows: 1,
          type: 'text',
          validator: ValidationRules.ADDRESS
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
          validator: ValidationRules.DATE
      }
  ]
};
