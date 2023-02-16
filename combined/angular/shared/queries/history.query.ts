import {gql} from '@apollo/client/core';

export const HistoryQuery = gql`
query HistoryReport($uniqueId: String!, $limit:Int, $page:Int, $sortBy:String, $sortDir:String) {
  history(unique_id: $uniqueId, limit: $limit, page: $page, sortBy: $sortBy, sortDir: $sortDir) {
    data {
      report_id
      unique_id
      lexid
      output_type
      status
      pf_status
      name_first
      name_last
      date_added
      date_returned
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
