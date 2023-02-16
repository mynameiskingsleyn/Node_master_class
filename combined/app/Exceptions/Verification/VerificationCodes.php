<?php

namespace App\Exceptions\Verification;

use LNWebAPI2\Framework\Responses\ResponseCodes;
use App\Exceptions\Common\CodeMessageTrait;

class VerificationCodes extends ResponseCodes
{
    use CodeMessageTrait;

    const QUERY_ERROR = 'QUERY_ERROR';
    const FILE_ERROR = 'FILE_ERROR';
    const INVALID_FILE = 'INVALID_FILE';
    const AUTHORIZATION_ERROR = 'AUTHORIZATION_ERROR';

    protected static $messages = [
        self::QUERY_ERROR => 'There was an error querying the database.' .
        ' Please try again. If the problem persists, please contact customer support.',
        self::FILE_ERROR => 'There was an error uploading file.' .
        ' Please try again. If the problem persists, please contact customer support.',
        self::INVALID_FILE => 'File is not vaid.' .
        ' Please provide a valid file or contact customer support.',
        self::AUTHORIZATION_ERROR => 'You are not authorized to perform this operation.' .
        ' Please contact customer support.',
    ];
}
