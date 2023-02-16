<?php

namespace App\Exceptions\Common\Formatters;

use App\Exceptions\Authentication\AuthenticationCodes as AuthCodes;
use App\Exceptions\Common\CommonCodes;

class ErrorFormatter
{
    const KEY_CODE = 'code';
    const KEY_MESSAGE = 'message';
    const KEY_DATA = 'data';

    /**
     * Returns the error as the expected format
     * @param string $apiCode
     * @param string $message
     * @param array $data
     * @return array
     */
    public static function format(string $apiCode, string $message, array $data = []): array
    {
        $code = self::codeMapping($apiCode);
        $message = self::messageMapping($apiCode, $message);
        return self::errorMapped($code, $message, $data);
    }

    /**
     * Returns the errors as the expected validation format
     * @param string $apiCode
     * @param array $messages
     * @return array
     */
    public static function formatValidation(string $apiCode, array $messages): array
    {
        $errors = [];
        $code = self::codeMapping($apiCode);
        foreach ($messages as $message) {
            $message = self::messageMapping($apiCode, $message);
            $errors[] = self::errorMapped($code, $message);
        }
        return $errors;
    }

    /**
     * Returns the default error format for unknown errors
     * @param string $apiCode
     * @param string $message
     * @return array
     */
    public static function defaultFormat(string $apiCode, string $message): array
    {
        $code = self::codeMapping($apiCode);
        $message = self::messageMapping($apiCode, $message);
        return self::errorMapped($code, $message);
    }

    /**
     * Maps given code to a more generic one to avoid security vulnerabilities like user enumeration
     * @param string $apiCode
     * @return string
     */
    public static function codeMapping(string $apiCode): string
    {
        switch ($apiCode) {
            case AuthCodes::USER_NOT_FOUND:
            case AuthCodes::WRONG_PASSWORD:
                return AuthCodes::INVALID_LOGIN_ID_OR_PASSWORD;
            case AuthCodes::INACTIVE_USER:
            case AuthCodes::INACTIVE_USER_SUSPENDED:
            case AuthCodes::ACCOUNT_IS_DISABLED:
            case AuthCodes::LOGIN_ID_LOCKED:
                return AuthCodes::ACCOUNT_ERROR;
            default:
                return $apiCode;
        }
    }

    /**
     * Maps given message to a more generic one to avoid security vulnerabilities like user enumeration
     * @param string $apiCode
     * @param string $message
     * @return string
     */
    public static function messageMapping(string $apiCode, string $message): string
    {
        switch ($apiCode) {
            case AuthCodes::USER_NOT_FOUND:
            case AuthCodes::WRONG_PASSWORD:
            case AuthCodes::INVALID_LOGIN_ID_OR_PASSWORD:
                return AuthCodes::authMessage(AuthCodes::INVALID_LOGIN_ID_OR_PASSWORD);
            case AuthCodes::INACTIVE_USER:
            case AuthCodes::INACTIVE_USER_SUSPENDED:
            case AuthCodes::ACCOUNT_IS_DISABLED:
            case AuthCodes::LOGIN_ID_LOCKED:
                return AuthCodes::authMessage(AuthCodes::ACCOUNT_ERROR);
            case AuthCodes::INVALID_IP:
                return AuthCodes::authMessage(AuthCodes::INVALID_IP);
            case CommonCodes::UNKNOWN_ERROR:
                return CommonCodes::message(CommonCodes::UNKNOWN_ERROR);
            default:
                return $message;
        }
    }

    /**
     * Returns an error formatted
     * @param string $code
     * @param string $message
     * @param array $data
     * @return array
     */
    protected static function errorMapped(string $code, string $message, array $data = []): array
    {
        return [
            self::KEY_CODE => $code,
            self::KEY_MESSAGE => filter_var($message, FILTER_SANITIZE_STRING),
            self::KEY_DATA => $data,
        ];
    }
}
