<?php

namespace App\Exceptions\Common;

use App\Exceptions\Common\CodeMessageTrait;

class CommonCodes
{
    use CodeMessageTrait;

    const UNKNOWN_ERROR = 'UNKNOWN_ERROR';

    protected static $messages = [
        self::UNKNOWN_ERROR => 'There was an error performing this action. Please contact customer service'
            . ' if this error persists.',
    ];
}
