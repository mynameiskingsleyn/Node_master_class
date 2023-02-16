<?php

namespace App\Exceptions\Common;

trait ApiExceptionTrait
{
    /**
     * @var string
     */
    protected $apiCode;

    /**
     * @var array
     */
    protected $data;

    /**
     * Returns string containing the API code
     * @return string
     */
    final public function getApiCode(): string
    {
        return $this->apiCode;
    }

    /**
     * Returns array containing data meaninful for the error
     * @return array
     */
    final public function getData(): array
    {
        return $this->data;
    }
}
