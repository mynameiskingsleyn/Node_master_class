<?php

namespace App\Exceptions\Search;

use LNWebAPI2\Framework\Responses\ResponseCodes;
use App\Exceptions\Common\CodeMessageTrait;

class RemoveSubjectCodes extends ResponseCodes
{
    use CodeMessageTrait;

    const SUBJECT_REMOVED = 'SUBJECT_REMOVED';
    const REMOVAL_FAILURE = 'REMOVAL_FAILURE';

    protected static $messages = [
        self::SUBJECT_REMOVED => 'The specified record has been removed.',
        self::REMOVAL_FAILURE => 'Removal cannot be completed at this time. '
          . 'Please try the request again. If the problem persists, please contact customer support.'
    ];
}
