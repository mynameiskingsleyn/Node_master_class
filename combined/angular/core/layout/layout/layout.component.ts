import { Component, OnInit, OnDestroy, Optional, Inject } from '@angular/core';
import { Subscription } from 'rxjs';
import { LnxAuthenticationService, LNX_AUTH_CONFIG, LnxAuthenticationConfig, LnxSessionService, SessionState } from '@lnx/authentication';
import { Router } from '@angular/router';
import { Apollo } from 'apollo-angular';
import { MatDialog, MatDialogRef, MatDialogState } from '@angular/material/dialog';
import { MessageDialogComponent } from '@app/shared/components/message-dialog/message-dialog.component';
import { AclService } from '@app/shared/services/acl/acl.service';
import { LnxErrorHandlerService, LnxError } from '@lnx/core';
import { AppEventsService } from '@app/shared/services/app-events/app-events.service';

@Component({
  selector: 'app-layout',
  templateUrl: './layout.component.html',
  styleUrls: ['./layout.component.sass']
})
export class LayoutComponent implements OnInit, OnDestroy {

  errorsSub: Subscription;
  protected dialogRef: MatDialogRef<any>;
  protected renewIsProcessing = false;
  protected subscriptions: Subscription = new Subscription();

  constructor(
      protected router: Router,
      protected authService: LnxAuthenticationService,
      protected sessionManager: LnxSessionService,
      protected aclService: AclService,
      protected apollo: Apollo,
      protected dialog: MatDialog,
      protected errorHandler: LnxErrorHandlerService,
      protected eventService: AppEventsService,
      @Optional() @Inject(LNX_AUTH_CONFIG) protected config: LnxAuthenticationConfig
  ) { }

  ngOnInit() {
    // Listen to any error that is reported in the app
    this.subscriptions.add(this.errorHandler.onError()
      .subscribe((errorList: LnxError[]) => {
        this.dialog.closeAll();
        this.onErrorReported(errorList);
      }));
    // Manage session
    if (this.sessionManager.getState() === SessionState.NONE ||
        this.sessionManager.getState() === SessionState.CLOSED) {
        // Start the session manager
        this.sessionManager.start();
        this.subscriptions.add(
          this.sessionManager.onStart().subscribe(() => {
            this.renewIsProcessing = false;
          })
        );
        this.subscriptions.add(
          this.sessionManager.renewConfirmation()
            .subscribe(mustRenew => {
              if (mustRenew) {
                this.userConfirmation();
              }
          })
        );
    }
  }

  protected userConfirmation(): void {
      const showModalRenewSession = (this.renewIsProcessing !== false) || // not processing the renew
        (typeof this.dialogRef === 'undefined') || // modal has not being created
        (this.dialogRef instanceof MatDialogRef && this.dialogRef.getState() === MatDialogState.CLOSED); // modal is closed
      if (showModalRenewSession) {
        this.dialogRef = this.dialog.open(MessageDialogComponent, {
          hasBackdrop: true,
          disableClose: true,
          closeOnNavigation: false,
          restoreFocus: true,
          data: {
            title: 'Session Expiration',
            message: 'Your session is about to expire. Please click continue to extend your session.',
            OK: 'Continue',
            CANCEL: 'Cancel',
          }
        });

        this.dialogRef.afterClosed().subscribe(result => {
          if (result) {
              this.renewIsProcessing = true;
              this.sessionManager.renewSession();
          } else {
              this.redirectUser();
          }
        });
    }
  }

  protected redirectUser() {
    this.router.navigate([this.config.logoutRoute]);
  }

  protected onErrorReported(errors: LnxError[]): void {
    this.eventService.notifyError(errors);
  }

  ngOnDestroy() {
    this.subscriptions.unsubscribe();
    this.dialog.closeAll();
  }

}
