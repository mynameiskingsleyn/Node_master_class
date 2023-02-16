import { Injectable, Inject } from '@angular/core';
import { Apollo } from 'apollo-angular';
import { Observable } from 'rxjs';
import { SubjectQuery } from '../queries/subject.query';
import { ActiveSubjects } from '../queries/active-subjects.query';
import { NumAlerts } from '../queries/num-alerts.query';
import { APP_DI_CONFIG, IAppConfig, APP_CONFIG } from '@app/config/app.config';
import { NumReports } from '../queries/num-reports.query';
import { SubjectAddress } from '@shared/models/reports/subject/subject-address.model';

@Injectable({
  providedIn: 'root'
})
export class SubjectService {

  alertsPollInterval: number;
  subjectsPollInterval: number;
  alertsCount: 0;

  constructor(private apollo: Apollo,
              @Inject(APP_CONFIG) config: IAppConfig
  ) {
      this.alertsPollInterval = config.alertsPollInterval;
      this.subjectsPollInterval = config.subjectsPollInterval;
  }

  subject(id: string, lexid: string, lastname: string): Observable<any> {
    return this.apollo.watchQuery({
      query: SubjectQuery,
      variables: {
        subjectId: id,
        lexId: Number(lexid),
        lastName: lastname
      }
    }).valueChanges;
  }

  getActiveSubjects(): Observable<any> {
    return this.apollo.watchQuery({
      query: ActiveSubjects,
      pollInterval: this.subjectsPollInterval,
    }).valueChanges;
  }

  getSubjectFullName(subjectName: any): string {
    let name = subjectName.First;
    if (subjectName.Middle) {
      name += ' ' + subjectName.Middle;
    }
    name += ' ' + subjectName.Last;
    return name;
  }

  getSubjectAddress(subjectAddress: any): SubjectAddress {
    return subjectAddress;
  }

  getSubjectDob(subjectDob: any): string {
    return subjectDob ? subjectDob.Month + '/' + subjectDob.Day + '/' + subjectDob.Year : '';
  }

  getNumberAlerts(): Observable<any> {
    return this.apollo.watchQuery({
      query: NumAlerts,
      pollInterval: this.alertsPollInterval,
      notifyOnNetworkStatusChange: true,
    }).valueChanges;
  }

  getNumberReports(): Observable<any> {
    return this.apollo.watchQuery({
      query: NumReports,
      pollInterval: this.alertsPollInterval,
      fetchPolicy: 'network-only',
      notifyOnNetworkStatusChange: true,
    }).valueChanges;
  }

}
