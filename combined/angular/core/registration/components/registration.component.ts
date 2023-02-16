import { Component, OnInit, OnDestroy, ChangeDetectorRef, AfterViewChecked } from '@angular/core';
import { Subscription } from 'rxjs';
import { UI_FORM_SETTINGS } from '@app/config/ui-search-form.config';
import { REGISTRATION_FORM_CONFIG } from './registration-form.config';
import { SearchField } from '@lnx/ui-search';
import { SearchService } from '@app/core/search/services/search.service';
import { LnxSearchService } from '@lnx/search';
import { RegistrationActionsComponent } from './registration-actions/registration-actions.component';
import { Router } from '@angular/router';
import { LnxAuthenticationService } from '@lnx/authentication';
import { MatDialog } from '@angular/material/dialog';
import { AclService } from '@app/shared/services/acl/acl.service';
import { SearchFormAbstract } from '@app/shared/components/search/search-form-abstract.component';
import { SearchFormInterface } from '@app/shared/interfaces/search-form.interface';
import { ErrorDialogComponent } from '@app/shared/components/error-dialog/error-dialog.component';

@Component({
  selector: 'app-registration',
  templateUrl: './registration.component.html',
  styleUrls: ['./registration.component.scss']
})
export class RegistrationComponent extends SearchFormAbstract implements OnInit, AfterViewChecked, OnDestroy, SearchFormInterface {

  enrollSubscription: Subscription;
  accountSubscription: Subscription;

  gridColumns = UI_FORM_SETTINGS.gridColumns;
  gutterSize = UI_FORM_SETTINGS.gutterSize;
  rowHeight = UI_FORM_SETTINGS.rowHeight;
  elevation = UI_FORM_SETTINGS.elevation;

  actions: any;

  constructor(
    private searchService: LnxSearchService,
    private gqlSearchService: SearchService,
    private accountService: LnxAuthenticationService,
    private router: Router,
    private dialog: MatDialog,
    private aclService: AclService,
    private cdr: ChangeDetectorRef
  ) {
    super();
  }

  ngOnInit() {
    // Users already registered must go to landing page directly
    if (!this.aclService.requiresRegistration()) {
      this.router.navigate([this.aclService.getModuleRoute()]);
    }
    this.actions = RegistrationActionsComponent;
    this.libSearchSubscription = this.searchService.searchChange().subscribe(params => {
      this.loading = true;
      this.actionsComponent.processing();
      const enrollParams = params;
      (enrollParams.dob as any) = this.getDateFormatted(params.dob);
      (enrollParams.register as any) = true;
      this.enrollSubscription = this.gqlSearchService.enrollSubject({...enrollParams}).subscribe(resp => {
        const registered = resp.data.enrollSubject.result.Lexid ? true : false;
        const success = JSON.parse(resp.data.enrollSubject.status);
        if (registered) {
          this.accountSubscription = this.accountService.account().subscribe(account => {
            this.router.navigate([this.aclService.getModuleRoute()]);
            this.stopProcessing();
          });
        } else if (!success) {
          this.stopProcessing();
          this.openDialog(resp.data.enrollSubject.description);
        }
      });
    });
  }

  ngAfterViewChecked() {
    this.cdr.detectChanges();
  }

  ngOnDestroy() {
    if (this.libSearchSubscription) {
      this.libSearchSubscription.unsubscribe();
    }
    if (this.enrollSubscription) {
      this.enrollSubscription.unsubscribe();
    }
    if (this.accountSubscription) {
      this.accountSubscription.unsubscribe();
    }
  }

  loadedActions(actionsComponent) {
    this.actionsComponent = (actionsComponent as RegistrationActionsComponent);
    this.searchForm = this.actionsComponent.searchForm;
  }

  private getDateFormatted(dob: string) {
    const date = new Date(dob);
    return {
      year: date.getFullYear(),
      month: date.getMonth() + 1,
      day: date.getDate()
    };
  }

  private openDialog(message: string) {
    this.dialog.open(ErrorDialogComponent, {
      width: '450px',
      data: message
    });
  }

  private stopProcessing() {
    this.loading = false;
    this.actionsComponent.processing(false);
  }

  formFields(): SearchField[] {
    return [
      ...REGISTRATION_FORM_CONFIG.fields
    ];
  }

  startNewSearch(resetValues: boolean): void {
  }

  restoreSearch(): void {
  }

}
