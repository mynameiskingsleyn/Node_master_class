import { Address } from './address.model';
import { DOB } from './dob.model';
import { Name } from './name.model';

export interface SubjectInformation {
  Name: Name;
  Address: Address;
  DOB: DOB;
  SSN: string;
  SubjectId?: string;
  Lexid?: string;
}
