<?php

namespace App\Exceptions\Common;

use GraphQL\Error\Error as GQLException;
use App\Exceptions\Common\ApiExceptionTrait;

abstract class BaseGQLException extends GQLException
{
    use ApiExceptionTrait;

    public function __construct(string $apiCode, string $message = '', array $data = [])
    {
        $this->apiCode = $apiCode;
        $this->data = $data;
        parent::__construct($message);
    }
}
