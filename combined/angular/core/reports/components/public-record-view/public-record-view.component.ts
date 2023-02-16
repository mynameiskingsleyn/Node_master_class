import { Component, OnInit, Input } from '@angular/core';
import { AclService } from '@app/shared/services/acl/acl.service';

@Component({
  selector: 'app-public-record-view',
  templateUrl: './public-record-view.component.html',
  styleUrls: ['./public-record-view.component.sass']
})
export class PublicRecordViewComponent implements OnInit {

  @Input() report: any;
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

  toggleExpand() {
  }

}
