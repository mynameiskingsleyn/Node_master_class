import { Component, Inject } from '@angular/core';
import { Subscription } from 'rxjs';
import { SearchField } from '@lnx/ui-search';
import { Validators, FormGroup, FormBuilder } from '@angular/forms';
import { LnxSearchService } from '@lnx/search';
import { last, takeLast } from 'rxjs/operators';
import { MatDialogRef, MAT_DIALOG_DATA } from '@angular/material/dialog';

@Component({
  selector: 'app-filters-dialog',
  templateUrl: './filters-dialog.component.html',
  styleUrls: ['./filters-dialog.component.sass']
})
export class FiltersDialogComponent {

    searchStream: Subscription;
    loading = false;

    gridColumns = 4;
    gutterSize = '8px';
    rowHeight = '55px';
    elevation = 'mat-elevation-z0';

    filtersForm = this.fb.group({
      date_range: ['', Validators.required],
      start_date: [''],
      end_date: ['']
    });

    libSearchSubscription: Subscription;

    resultSearch = '';

    cancelDialog(): void {
      this.dialogRef.close(false);
    }

    constructor(private fb: FormBuilder,
                private searchService: LnxSearchService,
                public dialogRef: MatDialogRef<FiltersDialogComponent>,
                @Inject(MAT_DIALOG_DATA) public data: any) {

        const search = this.searchService.lastSearch();

        this.filtersForm.controls.date_range.setValue(search.date_range);
        this.filtersForm.controls.date_range.updateValueAndValidity();
        this.filtersForm.controls.start_date.setValue(new Date(search.start_date));
        this.filtersForm.controls.start_date.updateValueAndValidity();
        this.filtersForm.controls.end_date.setValue(new Date(search.end_date));
        this.filtersForm.controls.end_date.updateValueAndValidity();
    }

    get dateRange() {
      return this.filtersForm.get('date_range');
    }

    get startDate() {
      return this.filtersForm.get('start_date');
    }

    get endDate() {
      return this.filtersForm.get('end_date');
    }

    submitFilters() {
      const lastSearch = this.searchService.lastSearch();
      const dateFilters = this.filtersForm.value;

      if (dateFilters.date_range === 'custom') {

          if (typeof dateFilters.start_date === 'object') {
            dateFilters.start_date = dateFilters.start_date.toLocaleString('en-US', { dateStyle: 'short' });
          }

          if (typeof dateFilters.end_date === 'object') {
            dateFilters.end_date = dateFilters.end_date.toLocaleString('en-US', { dateStyle: 'short' });
          }

      } else {
        delete dateFilters.start_date;
        delete dateFilters.end_date;
      }

      const searchWithDate = {
        ...lastSearch,
        ...dateFilters
      };

      this.searchService.search(searchWithDate);
      this.dialogRef.close(true);
    }

    onDatesChange(date) {
      this.filtersForm.controls.date_range.setValue('custom');
      this.filtersForm.controls.date_range.updateValueAndValidity();
    }
}
