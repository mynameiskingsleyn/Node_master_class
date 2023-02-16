<?php

namespace App\Exceptions\Common;

use Exception;
use Throwable;
use App\Exceptions\Common\ApiExceptionTrait;

abstract class BaseException extends Exception
{
    use ApiExceptionTrait;

    public function __construct(string $apiCode, string $message = '', int $code = 0, Throwable $previous = null)
    {
        $this->apiCode = $apiCode;
        $httpCode = empty($code) ? $this->httpCode() : $code;
        parent::__construct($message, $httpCode, $previous);
    }

    /**
     * Returns the correct HTTP code for the response
     * @return int HTTP Code
     */
    abstract public function httpCode(): int;
}
