<?php

declare(strict_types=1);

namespace App\Modules\Search\Services;

use LNWebAPI2\Framework\Responses\IResult;
use Exception;
use Illuminate\Http\Request;
use LNWebAPI2\Plugins\MoLog\Log;
use LNWebAPI2\Plugins\Search\LogMessage;
use App\Exceptions\Search\EspException;
use App\Exceptions\Search\EspCodes;
use App\Logging\Writer;
use Illuminate\Support\Facades\App;
use App\Services\Common\ProductModules;
use App\Services\User\AccountService;

/**
* Service Search
*
* @package     App\Modules\Search\Service
*/
abstract class BaseSearchService
{
    protected $espName;

    protected $version;

    protected $configKeyDefaultEsp;

    protected $searchService;

    protected $authService;

    public function __construct()
    {
        $this->configure();
    }

    public function configure($esp = null, $version = null)
    {
        $defaultESP = config('Search.' . $this->configKeyDefaultEsp);

        if (!$defaultESP) {
            $message = EspCodes::message(EspCodes::ESP_DEFAULT_MISSING);
            Writer::espError(__METHOD__, $message, EspCodes::ESP_DEFAULT_MISSING);
            throw new EspException(EspCodes::ESP_DEFAULT_MISSING, $message);
        }

        $this->espName = $esp ?? $defaultESP;

        $espConfig  = config('Search.' . $this->espName);

        if (!$espConfig) {
            $message = EspCodes::message(EspCodes::ESP_CONFIG_MISSING);
            Writer::espError(__METHOD__, $message, EspCodes::ESP_CONFIG_MISSING);
            throw new EspException(EspCodes::ESP_CONFIG_MISSING, $message);
        }

        if ($version) {
            $this->version = $version;
        } elseif ($espConfig['version']) {
            $this->version = $espConfig['version'];
        } else {
            $message = EspCodes::message(EspCodes::ESP_VERSION_MISSING);
            Writer::espError(__METHOD__, $message, EspCodes::ESP_VERSION_MISSING);
            throw new EspException(EspCodes::ESP_VERSION_MISSING, $message);
        }

        return $this;
    }

    public function request(string $method, array $parameters, $rootRecordName = '', $options = [])
    {
        $parameters = $this->prepare($parameters);
        Log::info(__METHOD__ . ' - ' . LogMessage::START_SEARCH_ON . $this->espName . ' ' . $method);
        Writer::requestMasked(__METHOD__, $parameters, LogMessage::START_SEARCH_PARAM);
        $result = $this->searchService
            ->search(
                $parameters,
                $this->espName,
                $method,
                $this->version,
                null,
                $rootRecordName,
                $options
            );
        Log::info(LogMessage::SEARCH_CODE . $result->getCode());
        return $this->response($result);
    }

    abstract public function response(IResult $result);

    abstract public function prepare(array $parameters): array;
}
