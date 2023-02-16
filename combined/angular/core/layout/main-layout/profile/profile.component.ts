import { Component, OnInit, OnDestroy, Inject } from '@angular/core';
import { LnxAuthenticationAccountService } from '@lnx/authentication';
import { SubjectService } from '@app/shared/services/subject.service';
import { Subscription } from 'rxjs';
import { ACL_ROUTES } from '@app/shared/services/acl/config/acl-routes';
import { AclRoutesInterface } from '@app/shared/services/acl/config/acl-routes.interface';

@Component({
  selector: 'app-profile',
  templateUrl: './profile.component.html',
  styleUrls: ['./profile.component.sass']
})
export class ProfileComponent implements OnInit, OnDestroy {

  displayName: string;

  activeSubjects = 0;
  sActiveSubjects: string = "0";
  loading = true;

  subjectSubscription: Subscription;

  constructor(
    private accountService: LnxAuthenticationAccountService,
    private subjectService: SubjectService,
    @Inject(ACL_ROUTES) public ACL: AclRoutesInterface
  ) { }

  ngOnInit() {
    const userInfo = JSON.parse(this.accountService.get());
    this.displayName = userInfo.user.userInfo.firstName + ' ' + userInfo.user.userInfo.lastName;
    this.subjectSubscription = this.subjectService.getActiveSubjects().subscribe(result => {
      if (result.data && result.data.activeSubjects) {
        this.loading = false;
        this.activeSubjects = result.data.activeSubjects;
        if (this.activeSubjects) {
          this.sActiveSubjects = this.activeSubjects.toLocaleString('en-US');
        }
      }
    });
  }

  ngOnDestroy() {
    if (this.subjectSubscription) {
      this.subjectSubscription.unsubscribe();
    }
  }

}
