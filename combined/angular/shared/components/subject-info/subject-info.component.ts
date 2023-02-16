import { Component, OnInit, OnDestroy } from '@angular/core';
import { PopoverConfig } from '../popover/popover-config.config';
import { Subscription } from 'rxjs';
import { SubjectService } from '@app/shared/services/subject.service';
import { SubjectAddress } from '@shared/models/reports/subject/subject-address.model';

@Component({
  selector: 'app-subject-info',
  templateUrl: './subject-info.component.html',
  styleUrls: ['./subject-info.component.sass']
})
export class SubjectInfoComponent implements OnInit, OnDestroy {

  subjectName: string;
  subjectAddress: SubjectAddress;
  subjectDob: string;
  loading = true;

  private subscription: Subscription;

  constructor(
    private config: PopoverConfig,
    private subjectService: SubjectService
  ) { }

  ngOnInit() {
    this.subscription = this.subjectService.subject(
      this.config.data.uniqueId,
      this.config.data.lexId,
      this.config.data.lastName
    ).subscribe(result => {
      if (result.data && result.data.getSubject.result) {
        this.loading = false;
        this.subjectName = this.subjectService.getSubjectFullName(result.data.getSubject.result.Name);
        this.subjectAddress = this.subjectService.getSubjectAddress(result.data.getSubject.result.Address);
        this.subjectDob = this.subjectService.getSubjectDob(result.data.getSubject.result.DOB);
      }
    });
  }

  ngOnDestroy(): void {
    if (this.subscription) {
      this.subscription.unsubscribe();
    }
  }

}
