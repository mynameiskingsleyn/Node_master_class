import { Component, OnInit, OnDestroy, ChangeDetectorRef, AfterViewChecked } from '@angular/core';
import { LnxSearchService } from '@lnx/search';
import { Subscription } from 'rxjs';
import { SearchService } from '../services/search.service';
import { SearchField } from '@lnx/ui-search';
import { FormControl, Validators } from '@angular/forms';
import { SearchActionsComponent } from '../components/search-actions/search-actions.component';
import { RemoveSubjectDialogComponent } from '../components/remove-subject-dialog/remove-subject-dialog.component';
import { MatDialog } from '@angular/material/dialog';
import { EnrollDialogComponent } from '../components/enroll-dialog/enroll-dialog.component';
import { UI_FORM_SETTINGS } from '@app/config/ui-search-form.config';
import { SEARCH_FORM_CONFIG } from '@app/shared/components/search/config/search-form.config';
import { ConfirmEnrollDialogComponent } from '../components/confirm-enroll-dialog/confirm-enroll-dialog.component';
import { EnrollSuccessDialogComponent } from '../components/enroll-success-dialog/enroll-success-dialog.component';
import { FormGroup } from '@angular/forms';
import { SearchFormAbstract } from '@app/shared/components/search/search-form-abstract.component';
import { SearchFormInterface } from '@app/shared/interfaces/search-form.interface';
import { AclService } from '@app/shared/services/acl/acl.service';
import { AppEventsService } from '@app/shared/services/app-events/app-events.service';
import { ErrorDialogComponent } from '@app/shared/components/error-dialog/error-dialog.component';
import { take } from 'rxjs/operators';
import { ValidationRules } from '@app/shared/validators/validation-rules';

@Component({
  selector: 'app-search-form',
  templateUrl: './search-form.component.html',
})
export class SearchFormComponent extends SearchFormAbstract implements OnInit, AfterViewChecked, OnDestroy, SearchFormInterface {

  gridColumns = UI_FORM_SETTINGS.gridColumns;
  gutterSize = UI_FORM_SETTINGS.gutterSize;
  rowHeight = UI_FORM_SETTINGS.rowHeight;
  elevation = UI_FORM_SETTINGS.elevation;

  enrolling = false;

  private eventSubscription: Subscription;

  constructor(
    private searchService: LnxSearchService,
    private gqlSearchService: SearchService,
    public dialog: MatDialog,
    protected aclService: AclService,
    private cdr: ChangeDetectorRef,
    private eventService: AppEventsService
  ) {
    super();
  }

  ngOnInit() {

      this.fields = this.formFields();

      this.searchActions = SearchActionsComponent;

      this.libSearchSubscription = this.searchService.searchReset().subscribe(shouldReset => {
        if (shouldReset) {
          this.startNewSearch();
        }
      });

      this.libSearchSubscription = this.searchService.searchChange().subscribe(params => {

        if (this.enrolling) {
          this.acceptEnrollDialog(params);
        } else {
            this.resultSearch = '';
            this.loading = true;
            this.resultsLoaded = false;

            this.searchSubscription = this.gqlSearchService.searchReports({
                filters: {
                    ...params
                },
            }).subscribe(result => {
                this.loading = false;
                if (result.data && result.data.search) {
                    if (result.data.search.data && result.data.search.data.length > 0) {
                      this.results = result.data.search;
                      this.resultsLoaded = true;
                    } else {
                      this.resultsLoaded = false;
                      if (this.acceptEnroll(params) && result.data.search.can_enroll) {
                        this.enrollDialog();
                      } else {
                        this.resultSearch = 'FAIL';
                      }
                    }
                }
            });
        }
      });

      this.eventSubscription = this.eventService.errorOccurred$.subscribe(() => this.loading = false);
  }

  ngAfterViewChecked() {
    this.cdr.detectChanges();
  }

  ngOnDestroy() {
    if (this.libSearchSubscription) {
      this.libSearchSubscription.unsubscribe();
    }
    if (this.searchSubscription) {
      this.searchSubscription.unsubscribe();
    }
    if (this.eventSubscription) {
      this.eventSubscription.unsubscribe();
    }
  }

  acceptEnroll(params) {
    return !((params.id || false) ||
             (params.lexid || false) ||
             (params.date_range || false) as boolean);
  }

  enrollDialog(): void {
      const dialogRef = this.dialog.open(EnrollDialogComponent, {
          width: '450px',
          data: {}
      });

      dialogRef.afterClosed().subscribe(result => {
          this.enrolling = (this.actionsComponent as SearchActionsComponent).showEnroll = result;

          if (this.enrolling) {
              this.setEnrollForm();
          }

      });
  }

  acceptEnrollDialog(params): void {
    const dialogRef = this.dialog.open(ConfirmEnrollDialogComponent, {
        width: '450px',
        data: params
    });

    dialogRef.afterClosed().subscribe(result => {
        if (this.enrolling && result) {

          this.resultSearch = '';
          this.loading = true;
          this.resultsLoaded = false;

          const enrollParams = {
            ...params,
            dob: this.getDateFormatted(params.dob)
          };
          this.gqlSearchService.enrollSubject({
              ...enrollParams
          }).subscribe((resp) => {
              this.loading = false;
              if (resp.data.enrollSubject.status) {
                  this.startNewSearch();
                  this.openEnrollSuccessDialog();
              }
            }
          );

        } else {
          // TODO - check if enroll params should be cleared out
          // this.startNewSearch(false);
        }
    });
  }

  openRemoveSubjectDialog(): void {
    const dialogRef = this.dialog.open(RemoveSubjectDialogComponent, {
        width: '450px',
        data: {}
    });

    dialogRef.afterClosed().subscribe(result => {
        this.enrolling = (this.actionsComponent as SearchActionsComponent).showEnroll = result;

        if (this.enrolling) {
            this.setEnrollForm();
        }

    });
  }

  loadedActions(actionsComponent) {
      this.actionsComponent = (actionsComponent as SearchActionsComponent);
      this.searchForm = this.actionsComponent.searchForm;
      this.restoreSearch();
  }

  setEnrollForm() {
    if (this.searchForm) {
        const enrollFields = {
          first_name: Validators.compose([Validators.required].concat(ValidationRules.NAME)),
          last_name: Validators.compose([Validators.required].concat(ValidationRules.NAME)),
          street_address: Validators.compose([Validators.required].concat(ValidationRules.ADDRESS)),
          city: Validators.compose([Validators.required].concat(ValidationRules.CITY)),
          state: Validators.compose([Validators.required].concat(ValidationRules.STATE)),
          zipcode: Validators.compose([Validators.required].concat(ValidationRules.ZIPCODE)),
          ssn: Validators.compose([Validators.required].concat(ValidationRules.SSN)),
          dob: Validators.compose([Validators.required].concat(ValidationRules.DOB)),
        };

        this.dynamicFields().forEach((field) => {
          if (this.searchForm.get(field.name) === null) {
            this.searchForm.addControl(field.name, new FormControl(field.value, field.validator));
          }
        });

        this.fields = this.fields.concat(this.dynamicFields());

        for (const key in enrollFields) {
          if (enrollFields.hasOwnProperty(key) && this.searchForm.get(key)) {
            const element = enrollFields[key];
            this.searchForm.controls[key].clearValidators();
            this.searchForm.controls[key].setValidators(element);
            this.searchForm.controls[key].updateValueAndValidity();
          }
        }
    }
  }

  private openEnrollSuccessDialog() {
    this.dialog.open(EnrollSuccessDialogComponent, {
      width: '450px'
    });
  }

  private getDateFormatted(dob: string) {
    const date = new Date(dob);
    return {
      year: date.getFullYear(),
      month: date.getMonth() + 1,
      day: date.getDate()
    };
  }

  restoreSearch() {
    const lastSearch = this.gqlSearchService.last();
    let doRestore = false;

    for (const fieldKey in lastSearch) {
      if (lastSearch.hasOwnProperty(fieldKey) && typeof lastSearch[fieldKey] === 'string' && lastSearch[fieldKey].length > 0) {
        doRestore = true;
        break;
      }
    }

    if (!doRestore) {
      return;
    }

    for (const field in lastSearch) {
      if (lastSearch.hasOwnProperty(field)) {
        const value = lastSearch[field];
        if (field === 'dob' && value) {
          this.searchForm.controls[field].setValue(new Date(value));
        } else {
          this.searchForm.controls[field].setValue(value);
        }
        this.searchForm.controls[field].updateValueAndValidity();
        this.searchForm.controls[field].markAsTouched();
        this.searchForm.controls[field].markAsDirty();
      }
    }

    (this.searchForm as FormGroup).updateValueAndValidity();

    this.searchService.search(lastSearch);
  }

  startNewSearch(resetValues = true) {
    this.enrolling = false;
    this.resultSearch = '';
    this.resultsLoaded = false;
    (this.actionsComponent as SearchActionsComponent).showEnroll = false;
    this.fields = this.formFields();
    this.fields.forEach((field) => {
      this.searchForm.controls[field.name].clearValidators();
      if (resetValues) {
        this.searchForm.controls[field.name].reset();
      }
      this.searchForm.controls[field.name].setValidators(field.validator);
      this.searchForm.controls[field.name].updateValueAndValidity();
    });
    this.dynamicFields().forEach((field) => {
      if (this.searchForm.get(field.name)) {
        this.searchForm.removeControl(field.name);
      }
    });

  }

  dynamicFields() {

    const fields: SearchField[] = [];

    if (this.aclService.showAgencySubjectId()) {

      const agencySubjectIdField = {
        name: 'agency_subject_id',
        label: 'Agency Subject ID',
        placeholder: '',
        cols: 2,
        rows: 1,
        type: 'text',
        validator: ValidationRules.UNIQUEID.concat( Validators.required )
      };

      fields.push(agencySubjectIdField);

    }

    return fields;
  }

  formFields(): SearchField[] {
    const fields: SearchField[] = SEARCH_FORM_CONFIG.fields


    return fields;
  }

}
