import { SubjectInfo } from './available-report-data.interface';

export interface Name {
  Full: string;
  First: string;
  Middle: string;
  Last: string;
  Suffix: string;
  Prefix: string;
}

export interface Address {
  StrretNumber: String;
  StreetPreDirection: string;
  StreetName: string;
  StreetSuffix: string;
  StreetPostDirection: string;
  UnitDesignation: string;
  UnitNumber: string;
  StreetAddress1: string;
  StreetAddress2: string;
  City: string;
  State: string;
  Zip5: string;
  County: string;
  PostalCode: string;
  StateCityZip: string;
  Latitude: string;
  Longitude: string;
}
export interface DOB {
  Day: number;
  Month: number;
  Year: number;
}
export interface SubjectInformation {
  Name: Name;
  Address: Address;
  DOB: DOB;
  SSN: string;
}
export interface PrReport {
  ReportDate: string;
  SubjectInformation: SubjectInformation;
  SubjectEcho: SubjectInfo;
  JudgmentAndLienRecords: any;
  BankruptcyRecords: any;
  Notes: any;
}
