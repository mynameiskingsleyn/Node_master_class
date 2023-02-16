<?php

return [
    \App\Modules\Search\Type\TransactionIDType::class,

    \App\Modules\Search\Type\AlertList\AlertListType::class,
    \App\Modules\Search\Type\BankruptcyRecord\BankruptcyRecordType::class,
    \App\Modules\Search\Type\CriminalRecord\CriminalRecordType::class,
    \App\Modules\Search\Type\ForeclosureRecord\ForeclosureRecordType::class,
    \App\Modules\Search\Type\InputRecord\InputRecordType::class,
    \App\Modules\Search\Type\JudgmentAndLienRecord\JudgmentAndLienRecordType::class,
    \App\Modules\Search\Type\PropertyRecord\PropertyRecordType::class,
    \App\Modules\Search\Type\SexOffenderRecord\SexOffenderRecordType::class,

    \App\Modules\Search\Type\BankruptcyRecordsType::class,
    \App\Modules\Search\Type\CriminalRecordsType::class,
    \App\Modules\Search\Type\ForeclosureRecordsType::class,
    \App\Modules\Search\Type\JudgmentAndLienRecordsType::class,
    \App\Modules\Search\Type\PropertyRecordsType::class,
    \App\Modules\Search\Type\SexOffenderRecordsType::class,

    \App\Modules\Search\Type\ProfessionalLicenseRecord\ProfessionalLicenseRecordType::class,
    \App\Modules\Search\Type\WatercraftRecord\WatercraftRecordType::class,
    \App\Modules\Search\Type\PhoneRecord\PhoneRecordType::class,
    \App\Modules\Search\Type\PeopleAtWorkRecord\PeopleAtWorkRecordType::class,
    \App\Modules\Search\Type\EmailAddressRecord\EmailAddressRecordType::class,

    \App\Modules\Search\Type\ProfessionalLicenseRecordsType::class,
    \App\Modules\Search\Type\WatercraftRecordsType::class,
    \App\Modules\Search\Type\PhoneRecordsType::class,
    \App\Modules\Search\Type\PeopleAtWorkRecordsType::class,
    \App\Modules\Search\Type\EmailAddressRecordsType::class,

    \App\Modules\Search\Type\PilotRecord\PilotRecordType::class,
    \App\Modules\Search\Type\NeighborRecord\NeighborRecordType::class,
    \App\Modules\Search\Type\MotorVehicleRecord\MotorVehicleRecordType::class,
    \App\Modules\Search\Type\AssociateRecord\AssociateRecordType::class,
    \App\Modules\Search\Type\AircraftRecord\AircraftRecordType::class,
    \App\Modules\Search\Type\UtilityRecord\UtilityRecordType::class,

    \App\Modules\Search\Type\MotorVehicleRecordsType::class,
    \App\Modules\Search\Type\AircraftRecordsType::class,
    \App\Modules\Search\Type\AssociateRecordsType::class,
    \App\Modules\Search\Type\NeighborRecordsType::class,
    \App\Modules\Search\Type\UtilityRecordsType::class,
    \App\Modules\Search\Type\PilotRecordsType::class,

    \App\Modules\Search\Type\SearchFiltersType::class,

    // Search
    \App\Modules\Search\Type\Subject\Name\NameType::class,
    \App\Modules\Search\Type\Subject\Address\AddressType::class,
    \App\Modules\Search\Type\Subject\DOB\DOBType::class,
    \App\Modules\Search\Type\Subject\Name\NameInput::class,
    \App\Modules\Search\Type\Subject\Address\AddressInput::class,
    \App\Modules\Search\Type\Subject\DOB\DOBInput::class,
    \App\Modules\Search\Type\Subject\SubjectInfoType::class,
    \App\Modules\Search\Type\Subject\SubjectReportInfoType::class,
    \App\Modules\Search\Type\Subject\SubjectType::class,
    \App\Modules\Search\Type\Subject\SubjectResultType::class,
    \App\Modules\Search\Type\Subject\InputEchoResultType::class,
    \App\Modules\Search\Type\Subject\SubjectInfoResultType::class,
    \App\Modules\Search\Type\Attorney\AttorneyType::class,

    \App\Modules\Search\Type\Subject\StatusType::class,
    \App\Modules\Search\Type\Subject\EnrollFormInput::class,
    \App\Modules\Search\Type\Subject\EnrollSubjectInput::class,

    \App\Modules\Search\Type\Subject\RemoveSubjectInput::class,
    \App\Modules\Search\Type\Subject\SubjectInfoInput::class,

    \App\Modules\Search\Type\PublicRecordReportType::class,
    \App\Modules\Search\Type\PublicRecordReportExpType::class,
    \App\Modules\Search\Type\NonFCRAPublicRecordReportType::class,
    \App\Modules\Search\Type\CreditReportDataType::class,
    \App\Modules\Search\Type\RunReportCreditReportDataType::class,
    \App\Modules\Search\Type\InsiderReportType::class,
    \App\Modules\Search\Type\NewReportResultInfoType::class,
    \App\Modules\Search\Type\NewReportInputEchoType::class,
    \App\Modules\Search\Type\InsiderReportExpType::class,
    \App\Modules\Search\Type\InsiderReportRunReportType::class,

    \App\Modules\Search\Type\CreditReport\BorrowerType::class,
    \App\Modules\Search\Type\CreditReport\CreditInquiryType::class,
    \App\Modules\Search\Type\CreditReport\CreditFileType::class,

    \App\Modules\Search\Type\CreditReport\CreditorTradeType::class,
    \App\Modules\Search\Type\CreditReport\ContactPointType::class,
    \App\Modules\Search\Type\CreditReport\CreditLateCountType::class,
    \App\Modules\Search\Type\CreditReport\CreditPaymentPatternType::class,
    \App\Modules\Search\Type\CreditReport\CreditCurrentRatingType::class,
    \App\Modules\Search\Type\CreditReport\CreditPublicRecordType::class,
    \App\Modules\Search\Type\CreditReport\BorrowerSubjectType::class,

    \App\Modules\Search\Type\CreditReport\CreditTradesType::class,
    \App\Modules\Search\Type\CreditReport\CreditCollectionsType::class,
    \App\Modules\Search\Type\CreditReport\CreditReportKeysType::class,
    \App\Modules\Search\Type\CreditReport\AliasesType::class,
    \App\Modules\Search\Type\CreditReport\ResidenceType::class,
    \App\Modules\Search\Type\CreditReport\EmployerType::class,
    \App\Modules\Search\Type\CreditReport\BorrowerResidenceType::class,
    \App\Modules\Search\Type\CreditReport\SubjectInformationType::class,
    \App\Modules\Search\Type\CreditReport\CreditRecordReportType::class,
    \App\Modules\Search\Type\CreditReport\CreditConsumerReferralType::class,

    \App\Modules\Search\Type\Subject\RunReportType::class,
    \App\Modules\Search\Type\Subject\InputEchoType::class,

    // exp search
    \App\Modules\Search\Type\InputRecord\InputRecordExpType::class,
    \App\Modules\Search\Type\DateType::class,
    \App\Modules\Search\Type\AddressesType::class,
    \App\Modules\Search\Type\Comment\CommentType::class,
    \App\Modules\Search\Type\Debtor\DebtorType::class,
    \App\Modules\Search\Type\Docket\DocketType::class,
    \App\Modules\Search\Type\Trustee\TrusteeType::class,
    \App\Modules\Search\Type\Trustee\Address\OrigAddressType::class,

    \App\Modules\Search\Type\PhoneTimeZone\PhoneTimeZoneType::class,
    // bankruptcy
    \App\Modules\Search\Type\BankruptcyRecordsExpType::class,
    \App\Modules\Search\Type\EmailsType::class,
    \App\Modules\Search\Type\StatusHistoryType::class,
    \App\Modules\Search\Type\CommentsType::class,
    \App\Modules\Search\Type\DocketsType::class,
    \App\Modules\Search\Type\AttorneysType::class,
    \App\Modules\Search\Type\DebtorsType::class,
    \App\Modules\Search\Type\PhoneTimeZonesType::class,
    \App\Modules\Search\Type\BankruptcyRecordExp\WithdrawnIndicatorType::class,
    \App\Modules\Search\Type\BankruptcyRecordExp\BankruptcyRecordExpType::class,
    \App\Modules\Search\Type\BankruptcyRecordExp\BankruptcyMeetingRecordType::class,
    \App\Modules\Search\Type\BankruptcyRecordExp\BankruptcyStatusType::class,
    \App\Modules\Search\Type\BankruptcyRecordExp\BankruptcySearchNamesType::class,
    \App\Modules\Search\Type\BankruptcyRecordExp\BankruptcyRecordAddressesType::class,
    \App\Modules\Search\Type\BankruptcyRecordExp\BankruptcyRecordPhonesType::class,
    \App\Modules\Search\Type\BankruptcyRecordExp\Name\BankruptcySearchNameType::class,
    \App\Modules\Search\Type\BankruptcyRecordExp\Statement\StatementIdRecType::class,
    \App\Modules\Search\Type\BankruptcyRecordExp\StatementIdRecsType::class,
    \App\Modules\Search\Type\BankruptcyRecordExp\Court\CourtType::class,
    \App\Modules\Search\Type\BankruptcyRecordExp\Court\Address\CourtAddressType::class,
    // LienJudgment
    \App\Modules\Search\Type\CreditorsType::class,
    \App\Modules\Search\Type\FilingsType::class,
    \App\Modules\Search\Type\ThirdPartiesType::class,
    \App\Modules\Search\Type\PartiesType::class,
    \App\Modules\Search\Type\JudgmentAndLienRecordsExpType::class,
    \App\Modules\Search\Type\Attorney\DebtorAttorneyType::class,
    \App\Modules\Search\Type\BusinessIdentity\BusinessIdentityType::class,
    \App\Modules\Search\Type\Company\NameAndCompanyType::class,
    \App\Modules\Search\Type\Creditor\CreditorType::class,
    \App\Modules\Search\Type\Debtor\DebtorAttorneysType::class,
    \App\Modules\Search\Type\Filing\FilingType::class,
    \App\Modules\Search\Type\JudgmentAndLienRecordExp\JudgmentAndLienRecordExpType::class,
    \App\Modules\Search\Type\MatchedParty\MatchedPartyType::class,
    \App\Modules\Search\Type\Party\ThirdPartyType::class,
    \App\Modules\Search\Type\Party\PartyType::class,
    // UnionTypes
    \App\Modules\Search\Type\Unions\InsiderReportUnionType::class
];