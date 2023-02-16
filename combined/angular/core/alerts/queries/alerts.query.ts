import {gql} from '@apollo/client/core';

export const AlertsQuery = gql`
query AlertsQuery($limit: Int, $page: Int, $sortBy: String, $sortDir: String, $filters: SearchFilters) {
  alerts(limit: $limit, page: $page, sortBy: $sortBy, sortDir: $sortDir, filters: $filters) {
    data {
      record_id
      unique_id
      name_first
      name_last
      lexid
      watcher
      max_pr_date
      max_cr_date
      max_nr_date
      report_type
      report_date
      pr_id
      cr_id
      nr_id
      pr_status
      cr_status
      nr_status
      pf_status
      pr_alert
      cr_alert
      status
    }
    total
    per_page
    current_page
    from
    to
    last_page
    has_more_pages
  }
}
`;
