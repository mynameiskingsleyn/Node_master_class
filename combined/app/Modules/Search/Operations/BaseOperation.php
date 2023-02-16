<?php

declare(strict_types=1);

namespace App\Modules\Search\Operations;

use App\Modules\Search\Services\SearchService;
use App\Modules\Shared\Traits\SanitizeInput;
use LNWebAPI2\Framework\Responses\IResult;
use LNWebAPI2\Framework\Providers\ProviderResponseCodes;
use App\Exceptions\Search\EspException;
use App\Exceptions\Search\EspCodes;

abstract class BaseOperation
{
    use SanitizeInput;

    protected $rootRequest;

    protected $rootResponse;

    protected $espName;

    protected $version;

    protected $method;

    protected $options;

    protected $searchService;

    protected $result;

    protected $blueprint;

    protected $mappings;

    protected $status;

    protected $description;

    public function __construct(SearchService $searchService)
    {
        $this->searchService = $searchService;

        if ($this->espName && $this->version) {
            $this->searchService->configure($this->espName, $this->version);
        }
    }

    protected function mapParams(array $parameters)
    {
        if (!$this->blueprint) {
            return $parameters;
        }

        $mapped_params = array_replace_recursive($this->blueprint, $parameters);

        return $mapped_params;
    }

    public function setOptions(array $options = [])
    {
        if ($options) {
            $this->options = array_replace_recursive($this->options, $options);
        }
        return $this;
    }


    public function prepareRequest($parameters)
    {
        // map parameters if a blueprint was defined
        if (is_array($this->blueprint)) {
            $parameters = $this->mapParams($parameters);
        }

        $sanitizer = function (&$value, $key) {
            $value = self::sanitize($value);
        };

        array_walk_recursive($parameters, $sanitizer);

        $requestParams = [];

        // set user request
        if (empty($this->rootRequest) === false) {
            $requestParams = [
                $this->rootRequest => $parameters,
            ];
        } else {
            $requestParams = $parameters;
        }

        // set options
        if (is_array($this->options)) {
            $requestParams['Options'] = array_merge($requestParams['Options']  ?? [], $this->options);
        }

        return $requestParams;
    }

    public function submit(array $parameters)
    {
        $this->result = $this->searchService->request(
            $this->method,
            $this->prepareRequest($parameters),
            $this->rootResponse,
            $this->options
        );
        $code = $this->result->getCode();
        if ($code !== ProviderResponseCodes::SUCCESS) {
            // TODO: Log here
            throw new EspException(EspCodes::ESP_ERROR, EspCodes::message(EspCodes::ESP_ERROR));
        }
        return $this->response($this->result);
    }

    public function response(IResult $result)
    {
        return $this->result->getData()->{$this->rootResponse} ?? $this->result->getData();
    }
}
