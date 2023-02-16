import { CreditorTrade } from './creditor-trade.model';

export interface CreditCollections {
  CREDITOR: CreditorTrade;
  SubscriberCode: string;
  CreditBusinessType: string;
  AccountReportedDate: string;
  AccountStatusType: string;
  HighCreditAmount: string;
  UnpaidBalanceAmount: string;
  CREDIT_COMMENT: string;
}
