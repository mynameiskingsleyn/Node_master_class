<?php

namespace App\Logging;

use LNWebAPI2\Plugins\MoLog\Log;
use App\Exceptions\Report\ReportCodes;
use App\Exceptions\Search\EspCodes;
use App\Exceptions\Common\CommonCodes;
use Illuminate\Support\Facades\App;
use App\Services\Common\MaskingService;

class LogWriter
{
    /**
     * Writes an error ocurred in a DB query
     * @param string $method
     * @param string $message
     * @param string $code
     */
    public function queryError(string $method, string $message = '', string $code = ReportCodes::QUERY_ERROR)
    {
        Log::error($method . ' - ' . $code . ' - ' . $message);
    }

    /**
     * Writes an error ocurred in an ESP call
     * @param string $method
     * @param string $message
     * @param string $code
     */
    public function espError(string $method, string $message = '', string $code = EspCodes::ESP_ERROR)
    {
        Log::error($method . ' - ' . $code . ' - ' . $message);
    }

    /**
     * Writes a request to the logs applying masking to sensitive fields
     * @param string $method
     * @param array $data
     * @param string $message
     */
    public function requestMasked(string $method, array $data, string $message = '')
    {
        $infoMsg = $method . ' - ';
        if (!empty($message)) {
            $infoMsg .= $message . ' - ';
        }
        $body = App::make(MaskingService::class)->sanitizeReqParams($data);
        Log::info($infoMsg . json_encode($body));
    }

    /**
     * Writes an unknonw error that ocurred
     * @param string $method
     * @param string $message
     * @param string $code
     */
    public function unknownError(string $method, string $message = '', string $code = CommonCodes::UNKNOWN_ERROR)
    {
        Log::error($method . ' - ' . $code . ' - ' . $message);
    }
}
