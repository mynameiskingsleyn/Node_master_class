import { ReportType } from '@app/core/utils/reports/report-type.enum';

export interface EnrollData {
  first_name: string;
  middle_name: string;
  last_name: string;
  dob: string;
  street_address: string;
  city: string;
  state: string;
  zipcode: string;
  ssn: string;
  agency_subject_id: string;
}
