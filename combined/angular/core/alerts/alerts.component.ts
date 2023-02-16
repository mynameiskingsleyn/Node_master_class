import { Component, OnInit, OnDestroy, ChangeDetectorRef, AfterViewChecked } from '@angular/core';
import { AlertsService } from './services/alerts.service';
import { Subscription } from 'rxjs';

@Component({
  selector: 'app-alerts',
  templateUrl: './alerts.component.html'
})
export class AlertsComponent implements OnInit, AfterViewChecked, OnDestroy {

  loading = true;
  results: any[];

  private subscription: Subscription;

  constructor(
    private alertsService: AlertsService,
    private cdr: ChangeDetectorRef
  ) {}

  ngOnInit() {
    this.subscription = this.alertsService.alerts().subscribe(result => {
      if (result.data && result.data.alerts) {
        this.loading = false;
        this.results = result.data.alerts;
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
