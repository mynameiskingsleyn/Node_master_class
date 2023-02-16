import { Name } from './name.model';
import { Address } from 'cluster';
import { Dob } from './dob.model';

export interface Subject {
  name: Name;
  address: Address;
  dob: Dob;
  register: boolean;
}
