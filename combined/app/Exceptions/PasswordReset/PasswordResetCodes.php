<?php

namespace App\Exceptions\PasswordReset;

use LNWebAPI2\Plugins\PasswordReset\Responses\PasswordResetResultCodes;

class PasswordResetCodes extends PasswordResetResultCodes
{
    const MAIL_SEND_ERROR = 'MAIL_SEND_ERROR';

    protected static $pwdResetMessages = [
        self::MAIL_SEND_ERROR => 'There was an error sending email. ' .
        'Please contact your organization’s system administrator.',
    ];

    /**
     * Gets custom response messages based on the response code
     * @param string $code
     * @return string
     */
    public static function pwdResetMessage(string $code): string
    {
        $messagesPool = array_merge(self::$messages, self::$pwdResetMessages);
        if (in_array($code, array_keys($messagesPool))) {
            return $messagesPool[$code];
        }
        return '';
    }
}
