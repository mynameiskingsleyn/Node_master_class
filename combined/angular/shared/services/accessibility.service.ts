import { Injectable, NgZone, OnInit } from '@angular/core';
import { Router, NavigationEnd } from '@angular/router';
import { filter } from 'rxjs/operators';
import { Observable } from 'rxjs';
import { environment } from '@environment';
import { TitleService } from './title.service';

@Injectable({
  providedIn: 'root'
})
export class AccessibilityService {

  navEnd: Observable<NavigationEnd>;

  public constructor(
    router: Router,
    private zone: NgZone,
    private titleService: TitleService
  ) {
    this.navEnd = router.events.pipe(
      filter(evt => evt instanceof NavigationEnd)
    ) as Observable<NavigationEnd>;
  }

  loadA11yCAT() {
    return new Observable<boolean>(observer => {
      this.zone.runOutsideAngular(() => {
        try {
          let script = document.createElement('script');
          script.src = environment.a11yCAT.cdn;
          script.async = false;
          document.body.append(script);
          observer.next(true);
        } catch (error) {
          observer.error(error);
        }
      });
    });
  }

  configureA11yCAT() {
    this.zone.runOutsideAngular(() => {
      if (typeof window['a11yCAT'] === 'object') {
        window['a11yCAT'].scanMode = window['a11yCAT'].modes.REALTIME;
        window['a11yCAT'].appName = environment.a11yCAT.appName;
        window['a11yCAT'].appKey = environment.a11yCAT.appKey;
        window['a11yCAT'].devName = environment.a11yCAT.devName;
        window['a11yCAT'].devKey = environment.a11yCAT.devKey;
        window['a11yCAT'].scanStandard = environment.a11yCAT.scanStandard;
      }
    });
  }

  trigger() {
    this.navEnd.subscribe(() => {
      this.zone.runOutsideAngular(() => {
        setTimeout(() => {
          window['a11yCAT'].checkA11y("App Pages", this.titleService.getTitle());
        }, 10000);
      });
    });
  }

  start() {
    if (environment.enablea11yCAT) {
      this.loadA11yCAT().subscribe(loaded => {
          if (loaded) {
            setTimeout(() => {
              this.configureA11yCAT();
            }, 1000);
            this.trigger();
          }
      });
    }
  }

}
