import { Injectable } from '@angular/core';
import { Subject } from 'rxjs';
import { MatDialog } from '@angular/material/dialog';
import { LnxError } from '@lnx/core';
import { ErrorDialogComponent } from '@app/shared/components/error-dialog/error-dialog.component';
import { EventConfig } from './config/event-config.interface';
import { ERROR_CONFIG } from './config/error-event.config';
import { FrontendErrorCodes } from '@app/shared/enums/frontend-error-codes.enum';

@Injectable({
  providedIn: 'root'
})
export class AppEventsService {

  private errorConfig: EventConfig = ERROR_CONFIG;

  private errorOccurred: Subject<LnxError[]> = new Subject<LnxError[]>();
  public errorOccurred$ = this.errorOccurred.asObservable();

  constructor(protected dialog: MatDialog) { }

  public notifyError(errorsList: LnxError[]): void {
    this.errorOccurred.next(errorsList);
    this.dialog.open(ErrorDialogComponent, {
      disableClose: true,
      width: this.errorConfig.width,
      data: {
        title: this.errorConfig.title,
        errors: errorsList,
        icon: this.errorConfig.icon,
        OK: this.errorConfig.dismissLabel,
        codes: FrontendErrorCodes
      }
    });
  }
}
