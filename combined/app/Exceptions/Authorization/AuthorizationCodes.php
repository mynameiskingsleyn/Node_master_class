<?php

namespace App\Exceptions\Authorization;

use App\Exceptions\Common\CodeMessageTrait;

class AuthorizationCodes
{
    use CodeMessageTrait;

    const ACTION_NOT_ALLOWED = 'ACTION_NOT_ALLOWED';

    protected static $messages = [
        self::ACTION_NOT_ALLOWED => 'You have tried to perform an action ' .
          'that is not allowed. ',
    ];
}
