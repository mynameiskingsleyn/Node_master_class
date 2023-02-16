<?php

namespace App\Exceptions\Report;

use LNWebAPI2\Framework\Responses\ResponseCodes;
use App\Exceptions\Common\CodeMessageTrait;

class ReportCodes extends ResponseCodes
{
    use CodeMessageTrait;

    const QUERY_ERROR = 'QUERY_ERROR';
    const INDIVIDUAL_NOT_FOUND = 'INDIVIDUAL_NOT_FOUND';
    const EXPORT_ERROR = 'EXPORT_ERROR';
    const EXPORT_CHROME_OP_TIMEOUT = 'EXPORT_CHROME_OP_TIMEOUT';
    const EXPORT_CHROME_NAV_EXPIRED = 'EXPORT_CHROME_NAV_EXPIRED';
    const ERROR_IN_EXPORT = 'The system has experienced an error in exporting the report. Please try again. If this error persists, please contact customer support.';

    protected static $messages = [
        self::QUERY_ERROR => 'There was an error in the querying the database.' .
        ' Please try again. If the problem persists, please contact customer support.',
        self::INDIVIDUAL_NOT_FOUND => 'Individual not found.',
        self::EXPORT_ERROR => self::ERROR_IN_EXPORT,
        self::EXPORT_CHROME_OP_TIMEOUT => self::ERROR_IN_EXPORT,
        self::EXPORT_CHROME_NAV_EXPIRED => self::ERROR_IN_EXPORT,
    ];
}
