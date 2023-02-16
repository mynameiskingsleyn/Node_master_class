import { Injectable } from '@angular/core';
import { AclService } from './acl/acl.service';

interface ColDef {
  def: string;
  hide: boolean;
}

@Injectable()
export class ColumnDefinitionsService {

  constructor(private aclService: AclService) {}

  public iisHistoryColumns(): string[] {
    const columns: ColDef[] = [
      {def: 'triggered_space', hide: false},
      {def: 'lexid', hide: false},
      {def: 'public_record', hide: !this.aclService.hasPrEnabled()},
      {def: 'credit_record', hide: !this.aclService.hasCrEnabled()},
      {def: 'combined_record', hide: !this.aclService.hasCombinedEnabled()},
      {def: 'action_space', hide: false}
    ];
    return this.getColumnNames(columns);
  }

  public reWriteResultsColumns(): string[] {
    const columns: ColDef[] = [
      {def: 'watcher', hide: !this.aclService.hasMonitoringEnabled()},
      {def: 'history', hide: false},
      {def: 'triggered', hide: !this.aclService.hasNrEnabled()},
      {def: 'identity', hide: false},
      {def: 'max_pr_date', hide: !this.aclService.hasPrEnabled()},
      {def: 'max_cr_date', hide: !this.aclService.hasCrEnabled()},
      {def: 'max_nr_date', hide: !this.aclService.hasNrEnabled()},
      {def: 'report_date', hide: !this.aclService.hasCombinedEnabled()},
      {def: 'action_menu', hide: false}
    ];
    return this.getColumnNames(columns);
  }

  public resultsColumns(): string[] {
    const columns: ColDef[] = [
      {def: 'watcher', hide: !this.aclService.hasMonitoringEnabled()},
      {def: 'history', hide: false},
      {def: 'triggered', hide: !this.aclService.hasNrEnabled()},
      {def: 'unique_id', hide: false},
      {def: 'lexid', hide: false},
      {def: 'name_first', hide: false},
      {def: 'name_last', hide: false},
      {def: 'max_pr_date', hide: !this.aclService.hasPrEnabled()},
      {def: 'max_cr_date', hide: !this.aclService.hasCrEnabled()},
      {def: 'max_nr_date', hide: !this.aclService.hasNrEnabled()},
      {def: 'report_date', hide: !this.aclService.hasCombinedEnabled()},
      {def: 'action_menu', hide: false}
    ];
    return this.getColumnNames(columns);
  }
  public alertsColumns(): string[] {
    const columns: ColDef[] = [
      {def: 'history', hide: false},
      {def: 'unique_id', hide: false},
      {def: 'lexid', hide: false},
      {def: 'name_first', hide: false},
      {def: 'name_last', hide: false},
      {def: 'max_pr_date', hide: !this.aclService.hasPrEnabled()},
      {def: 'max_cr_date', hide: !this.aclService.hasCrEnabled()},
      {def: 'max_nr_date', hide: !this.aclService.hasNrEnabled()},
      {def: 'report_date', hide: !this.aclService.hasCombinedEnabled()},
      {def: 'action_menu', hide: false}
    ];
    return this.getColumnNames(columns);
  }

  private getColumnNames(definitions: ColDef[]): string[] {
    return definitions.filter(col => !col.hide).map(col => col.def);
  }
}
