<?php

namespace App\Exceptions\PasswordReset;

use App\Exceptions\Common\BaseGQLException;
use LNWebAPI2\Framework\Responses\ResponseCodes;
use App\Exceptions\Authentication\AuthenticationCodes as AuthCodes;

class PasswordResetException extends BaseGQLException
{
    public function __construct(string $apiCode, string $message = '', array $data = [])
    {
        $code = $this->pwdResetCodeMapping($apiCode);
        $message = $this->pwdResetMessageMapping($apiCode, $message);
        parent::__construct($code, $message, $data);
    }

    /**
     * Formats the exception code correclty for the case that login not found returns
     * INVALID_PARAMETER code
     * @param string $apiCode
     * @return string
     */
    protected function pwdResetCodeMapping(string $apiCode): string
    {
        if ($apiCode === ResponseCodes::INVALID_PARAMETER) {
            return AuthCodes::INVALID_LOGIN_ID_OR_PASSWORD;
        }
        return $apiCode;
    }

    /**
     * Formats the exception message correclty for the case that login not found returns
     * `login_id not found` message, this is a security concern
     * @param string $apiCode
     * @param string $message
     * @return string
     */
    protected function pwdResetMessageMapping(string $apiCode, string $message = ''): string
    {
        switch ($apiCode) {
            case ResponseCodes::INVALID_PARAMETER:
                return AuthCodes::message(AuthCodes::INVALID_LOGIN_ID_OR_PASSWORD);
            case PasswordResetCodes::MAIL_SEND_ERROR:
                return PasswordResetCodes::pwdResetMessage(PasswordResetCodes::MAIL_SEND_ERROR);
            default:
                return $message;
        }
    }
}
