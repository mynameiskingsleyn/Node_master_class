import { AfterViewChecked, ChangeDetectorRef, Component, OnDestroy, OnInit } from '@angular/core';
import { ReportService } from '@app/core/reports/services/report.service';
import { Subscription } from 'rxjs';

@Component({
  selector: 'app-user-reports',
  templateUrl: './user-reports.component.html',
  styleUrls: ['./user-reports.component.sass']
})
export class UserReportsComponent implements OnInit, AfterViewChecked, OnDestroy {

  loading = true;
  results: any[];

  private subscription: Subscription;

  constructor(
    private reportsService: ReportService,
    private cdr: ChangeDetectorRef
  ) {}

  ngOnInit() {
    this.subscription = this.reportsService.getReports().subscribe(result => {
      this.loading = result.loading;
      if (result.data && result.data.reports) {
        this.results = result.data.reports;
      }
    });
  }

  ngAfterViewChecked() {
    this.cdr.detectChanges();
  }

  ngOnDestroy() {
    if (this.subscription) {
      this.subscription.unsubscribe();
    }
  }
}
