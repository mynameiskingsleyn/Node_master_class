import { Aliases } from './aliases.model';
import { Employer } from './employer.model';
import { Residence } from './residence.model';

export interface Borrower {
  FirstName: string;
  LastName: string;
  BirthDate: string;
  UnparsedName: string;
  SSN: string;
  Aliases: Aliases[];
  Residence: Residence[];
  Employer: Employer[];
}
