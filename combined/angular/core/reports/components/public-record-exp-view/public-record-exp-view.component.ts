import { Component, OnInit, Input } from '@angular/core';
import { AclService } from '@app/shared/services/acl/acl.service';
import { PrReport } from '@app/core/utils/interfaces/pr-report.interface';

@Component({
  selector: 'app-public-record-exp-view',
  templateUrl: './public-record-exp-view.component.html',
  styleUrls: ['./public-record-exp-view.component.sass']
})
export class PublicRecordExpViewComponent implements OnInit {

  @Input() report: PrReport;
  @Input() loading = true;
  @Input() printable = false;
  @Input() expanded = false;

  titleDateFormat = 'MM/dd/yyyy'; // equivalent to 'M/d/yy'
  verificationDateFormat = 'MM/DD/YYYY'; // momentjs format
  dateFormat = 'MM/DD/YYYY'; // momentjs format
  hideAgencyNotes = false;

  constructor(protected aclService: AclService) { }

  ngOnInit() {
    this.hideAgencyNotes = this.aclService.agencyNotesDisabled();
  }

}
