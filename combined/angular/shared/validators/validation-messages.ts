export class ValidationMessages {

    public id = {
      required: 'Required Unique ID',
      pattern: 'Invalid Unique ID'
    };

    public lexid = {
      required: 'Required LexID',
      pattern: 'Invalid LexID'
    };

    public username = {
      required: 'Username should not be empty',
      maxlength: 'Username should have less than 91 chars'
    };

    // eslint-disable-next-line
    public first_name = {
      required: 'Required First Name',
      pattern: 'Invalid First Name',
    };

    // eslint-disable-next-line
    public middle_name = {
      required: 'Required Middle Name',
      pattern: 'Invalid Middle Name',
    };

    // eslint-disable-next-line
    public last_name = {
      required: 'Required Last Name',
      pattern: 'Invalid Last Name',
    };

    // eslint-disable-next-line
    public street_address = {
      required: 'Required Street Address',
      pattern: 'Invalid Street Address',
    };

    public city = {
      required: 'Required City',
      pattern: 'Invalid City',
    };

    public state = {
      required: 'Required State',
      pattern: 'Invalid State',
    };

    public zipcode = {
      required: 'Required ZIP Code',
      maxlength: 'ZIP Code must have 5 digits',
      minlength: 'ZIP Code must have 5 digits',
      pattern: 'Invalid ZIP Code'
    };

    public ssn = {
      required: 'Required SSN',
      maxlength: 'SSN must have 9 digits',
      minlength: 'SSN must have 9 digits',
      pattern: 'Invalid SSN',
    };

    public dob = {
      required: 'Required DOB',
      validDate: 'Invalid DOB',
      pattern: 'Invalid format DOB',
      matDatepickerParse: 'Invalid format DOB',
    };

    // eslint-disable-next-line
    public agency_subject_id = {
      required: 'Required Agency Subject ID',
      pattern: 'Invalid Agency Subject ID'
    };

}
