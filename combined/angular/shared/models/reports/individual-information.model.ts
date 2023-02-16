import { InputEcho } from './subject/input-echo.model';
import { SubjectInformation } from './subject/subject-information.model';

export interface IndividualInformation {
  SubjectInformation: SubjectInformation;
  SubjectEcho: InputEcho;
  Notes: string;
}
