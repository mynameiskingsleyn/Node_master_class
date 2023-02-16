import { Borrower } from './borrower.model';

export interface CreditFile {
  FileID: string;
  SourceType: string;
  Borrower: Borrower;
  UnparsedAddresses: string[];
  Addresses: string[];
  UnparsedEmployment: string[];
}
