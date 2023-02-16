import { Injectable, Inject } from '@angular/core';
import { SharedModule } from '../shared.module';
import { EnrollData } from '@app/core/utils/interfaces/dialog-data.interface';

@Injectable({
  providedIn: SharedModule
})
export class EnrollDataQualityService
{
  AGE_LIMIT: number = 16;

  createConfirmData(data: EnrollData){
    let dataEmpty = true;
    for (const ob in data) { // set data empty to false if EnrollData has data
      dataEmpty = false;
    }
    if (dataEmpty) {  // check if data is empty
      return null
    }
    let nameHasError = false;
    let dobHasError = false;
    let subjectIdHasError = false;

    nameHasError = this.checkError([ data.first_name, data.middle_name, data.last_name ], 'name');
    dobHasError = this.checkError([data.dob], 'dob');

    let name = data.first_name;
    if (data.middle_name) {
      name = name + ' '+ data.middle_name;
    }
    name = name + ' ' + data.last_name;
    const fullName = {
      label: "Full Name", value: name, hasError: nameHasError
    };
    const subjectId = {
      label: "Agency Subject ID", value: data.agency_subject_id, hasError: subjectIdHasError
    };
    const fullAddress = { label: "Full Address", value: data.street_address +' '+ data.city + ', '+ data.state+' '+ data.zipcode,
                         hasError: false };
    const ssn = { label: "SSN", value: data.ssn, hasError: false };
    const dob = { label: "DOB", value: this.getDateFormatted(data.dob), hasError: dobHasError };
    let confirm_data =  [ fullName, fullAddress, ssn, dob, subjectId];
    return confirm_data;

  }

  checkError(data: string[], field: string =""){
    let hasError = false;
    if (field === "name") {
      hasError = this.nameCheck(data)
    }
    if (field ==="dob") {
      let birthDay = this.getDateFormatted(data[0])
      hasError = !this.legalAge(birthDay);
    }
    return hasError;
  }

  legalAge(birthday: string, legalAge: number = this.AGE_LIMIT){
    let optimizedBirthdate = birthday.replace(/-/g, "/");
    let theBirthDay = new Date(optimizedBirthdate);
    let ageDifMs = Date.now() - theBirthDay.getTime();
    let ageDate = new Date(ageDifMs);
    let age = Math.abs(ageDate.getUTCFullYear() - 1970);
    let currentDate = new Date().toJSON().slice(0,10) + ' 01:00:00';
    if (age < legalAge) {
      return false
    } else {
      return true;
    }

  }

  nameCheck( names: string[]){
    let lastNameLen = names[2] ? names[2].length : 0;
    if (lastNameLen <= 1) {
      return true;
    }
    for (let i = 0; i < names.length-1; i++) {
      for (let j = i+1; j < names.length; j++) {
        if (typeof names[i] === 'string' && typeof names[j] === 'string'
          && (names[i].toLowerCase().trim() === names[j].toLowerCase().trim())
          ) {
            return true;
        }
      }
    }
    return false;
  }

  getDateFormatted(dob: string) {
    const date = new Date(dob);
    return date.getMonth()+1 + '/'+date.getDate() +'/'+ date.getFullYear();
  }

}
