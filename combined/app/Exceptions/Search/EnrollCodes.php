<?php

namespace App\Exceptions\Search;

use LNWebAPI2\Framework\Responses\ResponseCodes;
use App\Exceptions\Common\CodeMessageTrait;

class EnrollCodes extends ResponseCodes
{
    use CodeMessageTrait;

    public const INDIVIDUAL_ENROLLED = 'INDIVIDUAL_ENROLLED';
    public const SINGLE_INDETITY_NOT_RESOLVED = 'SINGLE_INDETITY_NOT_RESOLVED';
    public const REGISTRATION_FAILURE = 'REGISTRATION_FAILURE';

    protected static $messages = [
        self::INDIVIDUAL_ENROLLED => 'The information entered matches an individual that ' .
          'already exists in the system. Please use a portion of the PII (e.g. First Name & Last ' .
          'Name, or SSN) to search for the individual.',
        self::SINGLE_INDETITY_NOT_RESOLVED => 'The parameters did not resolve to a single identity. Please '
          . 'check the parameters and try again.',
        self::REGISTRATION_FAILURE => 'Registration cannot be completed at this time. '
          . 'Please try the request again. If the problem persists, please contact customer support.',
    ];
}
