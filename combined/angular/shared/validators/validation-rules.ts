import { Validators } from '@angular/forms';
import { validDate } from './valid-date';

const PasswordRules = {
  PassLength:     Validators.minLength(12),
  PassLowercase:  Validators.pattern(RegExp(/^(?=.*?[a-z])/)),
  PassUppercase:  Validators.pattern(RegExp(/^(?=.*?[A-Z])/)),
  PassNumeric:    Validators.pattern(RegExp(/^(?=.*?[0-9])/)),
  PassSpecial:    Validators.pattern(RegExp(/^(?=.*?[" !"#$%&'()*+,-./:;<=>?@[\]^_`{|}~"])/))
};

const STATES = 'ak|al|ar|as|az|ca|co|ct|dc|de|fl|fm|ga|gu|hi|ia|id|il|in|ks|ky|la|' +
'ma|md|me|mh|mi|mn|mo|mp|ms|mt|nc|nd|ne|nh|nj|nm|nv|ny|oh|ok|or|pa|' +
'pr|pw|ri|sc|sd|tn|tx|ut|va|vi|vt|wa|wi|wv|wy|' +
'AK|AL|AR|AS|AZ|CA|CO|CT|DC|DE|FL|FM|GA|GU|HI|IA|ID|IL|IN|KS|KY|LA|' +
'MA|MD|ME|MH|MI|MN|MO|MP|MS|MT|NC|ND|NE|NH|NJ|NM|NV|NY|OH|OK|OR|PA|' +
'PR|PW|RI|SC|SD|TN|TX|UT|VA|VI|VT|WA|WI|WV|WY';

export const ValidationRules = {
  NAME:     [ Validators.pattern('[a-zA-Z0-9ÁáÉéÍíÓóÚúÑñ \.\#\'\-]*') ],
  LEXID:    [ Validators.maxLength(12), Validators.pattern('[0-9]{1,12}') ],
  UNIQUEID: [ Validators.pattern('[a-zA-Z0-9]*') ],
  ADDRESS:  [ Validators.pattern('[a-zA-Z0-9ÁáÉéÍíÓóÚúÑñ, \.\#\'\-]*') ],
  CITY:     [ Validators.pattern('[a-zA-Z \.\-]*') ],
  STATE:    [ Validators.maxLength(2), Validators.pattern('(' + STATES + ')*') ],
  ZIPCODE:  [ Validators.minLength(5), Validators.maxLength(5), Validators.pattern('[0-9]{5}') ],
  SSN:      [ Validators.minLength(9), Validators.maxLength(9), Validators.pattern('[0-9]{9}') ],
  DOB:      [ validDate('MM/DD/YYYY') ],
  DATE:     [ validDate('MM/DD/YYYY') ],
  PASSVAL:  [ PasswordRules.PassLength, PasswordRules.PassLowercase, PasswordRules.PassUppercase,
              PasswordRules.PassNumeric, PasswordRules.PassSpecial ]
};
