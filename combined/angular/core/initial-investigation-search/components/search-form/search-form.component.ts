import { Component, OnInit, OnDestroy, ChangeDetectorRef, AfterViewChecked, Input, Output, EventEmitter, Inject } from '@angular/core';
import { Subscription } from 'rxjs';
import { take } from 'rxjs/operators';
// router
import { Router, ActivatedRoute } from '@angular/router';
import { ACL_ROUTES } from '@app/shared/services/acl/config/acl-routes';
import { AclRoutesInterface } from '@app/shared/services/acl/config/acl-routes.interface';
// material
import { MatDialog } from '@angular/material/dialog';
// services
import { LnxSearchService } from '@lnx/search';
import { SearchService } from '../../services/search.service';
import { AclService } from '@app/shared/services/acl/acl.service';
import { AppEventsService } from '@app/shared/services/app-events/app-events.service';
import { ExportService } from '@app/shared/services/export.service';
import { ReportService } from '@app/core/reports/services/report.service';
// fields
import { SearchField } from '@lnx/ui-search';
// validation
import { ValidationRules } from '@app/shared/validators/validation-rules';
// form controls and config
import { FormGroup } from '@angular/forms';
import { FormControl, Validators } from '@angular/forms';
import { UI_FORM_SETTINGS } from '@app/config/ui-ii-search-form.config';
import { SEARCH_FORM_NO_MONITORING_CONFIG } from '@app/shared/components/search/config/search-form-no-monitoring.config';
// actions
import { SearchActionsComponent } from '../search-actions/search-actions.component';
// dialogs
import { EnrollDialogComponent } from '../dialogs/enroll-dialog/enroll-dialog.component';
import { RemoveSubjectDialogComponent } from '../dialogs/remove-subject-dialog/remove-subject-dialog.component';
import { ConfirmEnrollDialogComponent } from '../dialogs/confirm-enroll-dialog/confirm-enroll-dialog.component';
import { AvailableReportsDialogComponent } from '../dialogs/available-reports-dialog/available-reports-dialog.component';
import { ErrorDialogComponent } from '@app/shared/components/error-dialog/error-dialog.component';
// abstracts and interfaces
import { SearchFormAbstract } from '@app/shared/components/search/search-form-abstract.component';
import { SearchFormInterface } from '@app/shared/interfaces/search-form.interface';
// Enums and constants
import { ReportFormat } from '@app/core/utils/reports/report-format.enum';

@Component({
  selector: 'app-search-form',
  templateUrl: './search-form.component.html',
})
export class SearchFormComponent extends SearchFormAbstract implements OnInit, AfterViewChecked, OnDestroy, SearchFormInterface {

  gridColumns = UI_FORM_SETTINGS.gridColumns;
  gutterSize = UI_FORM_SETTINGS.gutterSize;
  rowHeight = UI_FORM_SETTINGS.rowHeight;
  elevation = UI_FORM_SETTINGS.elevation;

  enrolling = false; // will be an input from parent
  exportingPdf = false;
  enrollFields = null;
  prQuery = ReportFormat.PUBLIC_RECORD_EXP;
  prFormat: string;
  @Input()showEnroll = true;
  @Input()formSpan = "70";
  @Input()resultSpan = "100";
  pageLabel = "Record Search";
//  @Input()pageSpan = { formSpan: 40, resultSpan: 60};
  @Output() hasLoaded: EventEmitter<SearchFormComponent> = new EventEmitter<SearchFormComponent>();

  eventSubscription: Subscription;
  report$: Subscription = new Subscription();

  constructor(
    private router: Router,
    private route: ActivatedRoute,
    @Inject(ACL_ROUTES) public ACL: AclRoutesInterface,
    public searchService: LnxSearchService,
    public gqlSearchService: SearchService,
    public dialog: MatDialog,
    protected aclService: AclService,
    private cdr: ChangeDetectorRef,
    private eventService: AppEventsService,
    protected exportService: ExportService,
    protected reportService: ReportService
  ) {
    super();
  }

  ngOnInit() {
    this.pageLabel = this.route.snapshot.data['title'];
    this.fields = this.formFields();
    this.searchActions = SearchActionsComponent;
    this.hasLoaded.emit(this);
    this.eventSubscription = this.eventService.errorOccurred$.subscribe(() => this.loading = false);
    this.enrollFields = {
      first_name: Validators.compose([Validators.required].concat(ValidationRules.NAME)),
      last_name: Validators.compose([Validators.required].concat(ValidationRules.NAME)),
      street_address: Validators.compose([Validators.required].concat(ValidationRules.ADDRESS)),
      city: Validators.compose([Validators.required].concat(ValidationRules.CITY)),
      state: Validators.compose([Validators.required].concat(ValidationRules.STATE)),
      zipcode: Validators.compose([Validators.required].concat(ValidationRules.ZIPCODE)),
      ssn: Validators.compose([Validators.required].concat(ValidationRules.SSN)),
      dob: Validators.compose([Validators.required].concat(ValidationRules.DOB)),
    };
    this.prFormat = this.prQuery;
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
          if(result){
            this.router.navigate([this.ACL.NEWREPORT]);
          }

      });
  }

  availableDialog(result): void {

      const subject = result.subjectInfo;
      const res = result.InsiderReport;
      if (res.PublicRecordReportFormat) {
        this.prFormat = res.PublicRecordReportFormat;
      }
      const data = {
          subject: subject,
          result: res
        };
      const dialogRef = this.dialog.open(AvailableReportsDialogComponent, {
            width: '450px',
            data: data
        });

        dialogRef.afterClosed().subscribe(result => {
            if(result.code == 'view'){
              this.router.navigate([result.link]);
            }else if(result.code == 'download'){
              this.exportToPdf(result);
              this.restoreSearch();
            }
          });
  }

  acceptEnrollDialog(params): void {
    const dialogRef = this.dialog.open(ConfirmEnrollDialogComponent, {
        width: '500px',
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
          this.gqlSearchService.requestNewReport({
              ...enrollParams
          }).subscribe((resp) => {
              this.loading = false;
              this.resultsLoaded = true;
              if (resp.data.requestNewReport.status) {
                  //this.startNewEnroll();
                  this.availableDialog(resp.data.requestNewReport);
              }
            }
          );
        }
    });
  }

  restoreSearch() {  // needed by both
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
  loadedActions(actionsComponent) { // needed by both
      this.actionsComponent = (actionsComponent as SearchActionsComponent);
      (this.actionsComponent as SearchActionsComponent).showEnroll = this.showEnroll;
      this.searchForm = this.actionsComponent.searchForm;
      this.restoreSearch();
  }

  startNewEnroll(resetValues = true) {
    this.enrolling = true;
    this.resultSearch = '';
    this.resultsLoaded = false;
    const enrollFields = this.enrollFields;
    this.dynamicFields().forEach((field) => {
      if (this.searchForm.get(field.name) === null) {
        this.searchForm.addControl(field.name, new FormControl(field.value, field.validator));
      }
    });
    this.fields.forEach((field) => {
      if (resetValues) {
          this.searchForm.controls[field.name].reset();
          this.searchForm.controls[field.name].clearValidators();
      }
        this.searchForm.controls[field.name].setValidators(field.validator);
        this.searchForm.controls[field.name].updateValueAndValidity();
    });

    for (const key in enrollFields) {
      if (enrollFields.hasOwnProperty(key) && this.searchForm.get(key)) {
        const element = enrollFields[key];
        this.searchForm.controls[key].reset();
        this.searchForm.controls[key].clearValidators();
        this.searchForm.controls[key].setValidators(element);
        this.searchForm.controls[key].updateValueAndValidity();
      }
    }
  }

  startNewSearch(resetValues = true) {
    this.enrolling = false;
    this.resultSearch = '';
    this.resultsLoaded = false;
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
        validator: ValidationRules.UNIQUEID.concat( Validators.required ),
      };

      fields.push(agencySubjectIdField);

    }
    return fields;
  }

  formFields(): SearchField[] {
    return SEARCH_FORM_NO_MONITORING_CONFIG.fields;
  }

  setEnrollForm() {  // needed by enroll
    if (this.searchForm) {
        const enrollFields = this.enrollFields;

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

  private getDateFormatted(dob: string) {
    const date = new Date(dob);
    return {
      year: date.getFullYear(),
      month: date.getMonth() + 1,
      day: date.getDate()
    };
  }

  exportToPdf(result) {
    const elem = result.element;
    const selected = result.selected;
    this.exportingPdf = true;
    this.report$.add(
      this.exportService.exportToPdf({
        reportType: selected.type,
        uniqueId: elem.unique_id,
        lexid: Number(elem.lexId),
        reportDate: selected.date,
        historyId: Number(elem.historyId ? elem.historyId : null),
        prQuery: this.prQuery,
        prFormat: this.prFormat
      }).subscribe(result => {
        this.exportingPdf = false;
        if (result.data && result.data.exportReportPdf) {
          this.exportService.openPdfFile(result.data.exportReportPdf);
        }
      })
    );
  }

}
