import { BorrowerResidence } from './borrower-residence.model';

export interface BorrowerSubject {
  FirstName: string;
  LastName: string;
  BirthDate: string;
  MiddleName: string;
  NameSuffix: string;
  SSN: string;
  UnparsedName: string;
  Residence: BorrowerResidence[];
}
