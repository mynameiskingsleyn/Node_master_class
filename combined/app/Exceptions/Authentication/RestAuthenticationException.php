<?php

namespace App\Exceptions\Authentication;

use App\Exceptions\Common\BaseException;
use App\Exceptions\Authentication\AuthenticationCodes as AuthCodes;

class RestAuthenticationException extends BaseException
{
    /**
     * @param string $apiCode
     * @param string $message
     */
    public function __construct(string $apiCode, string $message = '')
    {
        parent::__construct($apiCode, $message);
    }

    /**
     * Returns the correct HTTP code for the response
     * @return int HTTP Code
     */
    public function httpCode(): int
    {
        switch ($this->apiCode) {
            case AuthCodes::USER_NOT_FOUND:
            case AuthCodes::INVALID_COMPANY_STATUS:
            case AuthCodes::INVALID_LOGIN_ID_OR_PASSWORD:
            case AuthCodes::LOGIN_ID_LOCKED:
            case AuthCodes::WRONG_PASSWORD:
            case AuthCodes::INACTIVE_USER_SUSPENDED:
            case AuthCodes::INVALID_IP:
            case AuthCodes::INVALID_TOKEN:
                return 401;
            default:
                return 501;
        }
    }
}
