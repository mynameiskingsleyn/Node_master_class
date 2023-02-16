import { Component, OnInit, Inject, Optional } from '@angular/core';
import { LNX_AUTH_CONFIG, LnxAuthenticationConfig, LnxSessionService } from '@lnx/authentication';
import { Router } from '@angular/router';
import { Apollo } from 'apollo-angular';
import { Subscription } from 'rxjs';

@Component({
  selector: 'app-logout',
  templateUrl: './logout.component.html',
})
export class LogoutComponent implements OnInit {

  private sub: Subscription = new Subscription();

  constructor(
        private router: Router,
        private apollo: Apollo,
        private sessionManager: LnxSessionService,
        @Optional() @Inject(LNX_AUTH_CONFIG) private config: LnxAuthenticationConfig
  ) {}

  ngOnInit() {
    this.sub.add(
      this.sessionManager.hasFinished().subscribe((finished) => {
          if (finished) {
            this.clearSessionData();
            this.router.navigate([this.config.logoutRedirect]);
          }
      })
    );

    this.sessionManager.destroy();
  }

  private clearSessionData() {
    sessionStorage.clear();
    localStorage.clear();
    this.apollo.client.clearStore();
  }

}
