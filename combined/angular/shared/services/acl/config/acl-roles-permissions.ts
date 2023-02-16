export const ROLE_VALUES = {
  analyst: 'GOVFCRA_ANALYST',
  espInternal: 'GOVFCRA_ESP_INTERNAL_USER',
  apiExternal: 'GOVFCRA_API_EXTERNAL_USER'
};

export const NVP_VALUES = {
  gcId: 'gc_id',
  employeeId: 'EmployeeID',
  productCode: 'GOVFCRA_PRODUCT_CODE',
  agencyNotesDisabled: 'disable_credit_notes'
};

export const PERMISSIONS_VALUES = {
  creditReport: 'GOVFCRA_CREDITREPORT',
  delete: 'GOVFCRA_DELETE',
  softDeleteEnabled: 'GOVFCRA_SOFT_DELETE_ENABLED',
  modify: 'GOVFCRA_MODIFY',
  search: 'GOVFCRA_SEARCH',
  initialInvestigationSearch: 'GOVFCRA_SEARCH',
  newreport: 'GOVFCRA_SEARCH',
  viewReports: 'GOVFCRA_VIEWREPORTS',
  monitoring: 'GOVFCRA_MONITORING_ENABLED',
  registration: 'GOVFCRA_ENABLE_SELF_ENROLLMENT',
  creditReportEnabled: 'GOVFCRA_CREDIT_REPORT_ENABLED',
  publicRecordsFcraEnabled: 'GOVFCRA_PUBLIC_RECORDS_FCRA_REPORT_ENABLED',
  publicRecordsNonFcraEnabled: 'GOVFCRA_PUBLIC_RECORDS_NONFCRA_REPORT_ENABLED',
  canadianCreditReportEnabled: 'GOVFCRA_CANADIAN_CREDIT_REPORT_ENABLED',
  noRecordReportSmall: 'GOVFCRA_NO_RECORD_REPORT_SMALL',
  showAgencySubjectId: 'GOVFCRA_SHOW_AGENCY_SUBJECT_ID'
};

export const AclPermissions = {
  all: {
    any: 'any'
  },
  fbi: {
    ...PERMISSIONS_VALUES
  },
  ice: {
    ...PERMISSIONS_VALUES
  },
  // FLETC Permissions
  flet: {
    ...PERMISSIONS_VALUES
  },
  // CBP Permissions
  dcbp: {
    ...PERMISSIONS_VALUES
  },
  // USCIS Permissions
  dcis: {
    ...PERMISSIONS_VALUES
  },
  // USCG1 Permissions
  dcg1: {
    ...PERMISSIONS_VALUES
  },
  // USCG2 Permissions
  dcg2: {
    ...PERMISSIONS_VALUES
  },
  // FPS Permissions
  dfps: {
    ...PERMISSIONS_VALUES
  },
  // CSO Permissions
  dcso: {
    ...PERMISSIONS_VALUES
  },
  // FEMA Permissions
  fema: {
    ...PERMISSIONS_VALUES
  },
  // TSA Permissions
  dtsa: {
    ...PERMISSIONS_VALUES
  },
  // USSS Permissions
  usss: {
    ...PERMISSIONS_VALUES
  },
  // CISA Permissions
  cisa: {
    ...PERMISSIONS_VALUES
  },
  // USAID Permissions
  uaid: {
    ...PERMISSIONS_VALUES
  },
};
