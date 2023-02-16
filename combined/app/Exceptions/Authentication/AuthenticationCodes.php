<?php

namespace App\Exceptions\Authentication;

use LNWebAPI2\Plugins\WebTokenAuth\Reponses\WebTokenResponseCodes as AuthCodes;

class AuthenticationCodes extends AuthCodes
{
    const ACCOUNT_ERROR = 'ACCOUNT_ERROR';

    protected static $authMessages = [
        self::INVALID_LOGIN_ID_OR_PASSWORD => 'Invalid username or password.',
        self::INVALID_IP => 'You are trying to login from an invalid IP Address.'
            . ' Please contact your system administrator.',
        self::ACCOUNT_ERROR => 'There is an error with your account. ' .
              'Please contact customer support.'
    ];

    /**
     * Gets custom response messages based on the response code
     * @param string $code
     * @return string
     */
    public static function authMessage(string $code): string
    {
        $messagesPool = array_merge(self::$messages, self::$authMessages);
        if (in_array($code, array_keys($messagesPool))) {
            return $messagesPool[$code];
        }
        return '';
    }
}
