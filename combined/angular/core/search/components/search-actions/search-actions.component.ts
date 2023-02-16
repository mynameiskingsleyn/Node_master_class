import { Component } from '@angular/core';
import { MatDialog } from '@angular/material/dialog';
import { MessageDialogComponent } from '@app/shared/components/message-dialog/message-dialog.component';
import { LnxSearchService } from '@lnx/search';
import { GlobalSearchService } from '@app/core/utils/global-search.service';
import { SearchActionsAbstract } from '@app/shared/components/search/search-actions-abstract.component';
import { FormGroup } from '@angular/forms';
import * as moment from 'moment';
@Component({
  selector: 'app-search-actions',
  templateUrl: './search-actions.component.html',
  styleUrls: ['./search-actions.component.sass']
})
export class SearchActionsComponent extends SearchActionsAbstract {

    showEnroll = false;

    constructor(
      public dialog: MatDialog,
      private searchService: LnxSearchService,
      private globalSearchService: GlobalSearchService
    ) {
      super();
    }

    requiredInputDialog(): void {
      const dialogRef = this.dialog.open(MessageDialogComponent, {
        width: '300px',
        data: {
          message: 'Please enter a valid criteria of search.',
          OK: 'OK'
        }
      });
    }

    submitSearch($event) {

      let notFilled = false;

      for (const field in this.searchForm.controls) {
        if ((this.searchForm as FormGroup).get(field)) {
          const value = (this.searchForm as FormGroup).get(field).value;
          if (value) {
            if ((value instanceof Date || moment.isMoment(value)) &&
                value.toString() !== 'Invalid Date' &&
                value.toString().length > 0) {
              notFilled = true;
            } else if (value && value.length > 0) {
              notFilled = true;
            }
          }
        }
      }

      if (!notFilled) {
        $event.preventDefault();
        this.requiredInputDialog();
      }
    }

    resetSearch($event) {
      this.searchService.reset();
      this.globalSearchService.reset();
    }
}
