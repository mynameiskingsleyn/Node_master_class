import { Component, OnInit, OnDestroy, Inject } from '@angular/core';
import { SubjectService } from '@app/shared/services/subject.service';
import { Subscription } from 'rxjs';
import { AclService } from '@app/shared/services/acl/acl.service';
import { ACL_ROUTES } from '@app/shared/services/acl/config/acl-routes';
import { AclRoutesInterface } from '@app/shared/services/acl/config/acl-routes.interface';
import { PERMISSIONS_VALUES as permissionsValue } from '@app/shared/services/acl/config/acl-roles-permissions';

@Component({
  selector: 'app-navigation',
  templateUrl: './navigation.component.html',
})
export class NavigationComponent implements OnInit, OnDestroy  {

  alertsSubscription: Subscription;
  reportsSubscription: Subscription;
  numAlerts = 0;
  numReports = 0;
  loading = true;
  showMyReports = false;
  permissions = permissionsValue;

  constructor(
    private subjectService: SubjectService,
    private aclService: AclService,
    @Inject(ACL_ROUTES) public ACL: AclRoutesInterface
  ) { }

  ngOnInit() {
    this.showMyReports = !this.aclService.hasMonitoringEnabled();
    if (this.aclService.hasMonitoringEnabled()) {
      this.alertsSubscription = this.subjectService.getNumberAlerts().subscribe(result => {
        if (result.data && result.data.hasOwnProperty('numAlerts')) {
          this.loading = false;
          this.numAlerts = result.data.numAlerts;
        }
      });
    } else {
      this.reportsSubscription = this.subjectService.getNumberReports().subscribe(result => {
        this.loading = result.loading;
        if (result.data && result.data.hasOwnProperty('numReports')) {
          this.numReports = result.data.numReports;
        }
      });
    }
  }

  ngOnDestroy() {
    if (this.alertsSubscription) {
      this.alertsSubscription.unsubscribe();
    }
    if (this.reportsSubscription) {
      this.reportsSubscription.unsubscribe();
    }
  }

}
