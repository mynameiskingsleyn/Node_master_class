<?php

namespace App\Http\Controllers;

use App\Http\Formatters\JsonResponse;
use LNWebAPI2\Framework\Connections\HTTP\Client;
use LNWebAPI2\Framework\Connections\SOAP\Client as SoapClient;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Laravel\Lumen\Http\ResponseFactory;
use Exception;
use SoapFault;
use PDO;
use LNWebAPI2\Plugins\MoLog\Log;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\TransferException;

class HealthCheckController extends Controller
{
    public const SUCCESS = 'success';
    public const FAILURE = 'failure';

    private const LOG_PREFIX = 'HealthCheck';

    /**
     * @var JsonResponse
     */
    protected $jsonResponse;

    public function __construct(JsonResponse $jsonResponse)
    {
        $this->jsonResponse = $jsonResponse;
    }

    /**
     * Main health check of all services used by the application.
     * @return Response|ResponseFactory Response with the status of the services
     */
    public function healthCheck()
    {
        $response = [
            'lnaa' => $this->checkLnaa(),
            'databases' => $this->checkDatabases(),
            'insider_threat_esp' => $this->checkInsiderThreatEsp(),
        ];
        $this->logFailedResponses($response);
        return response($response);
    }

    /**
     * Retuns LNAA test result
     * @return string
     */
    private function checkLnaa(): string
    {
        try {
            $httpClient = new Client([
                    'baseUrl' => env('Authentication_PROVIDER_PARAMS_ENDPOINT'),
                    'timeout' => 5
            ]);
            $lnaaResponse = $httpClient->request('GET', 'HealthCheck');
            if ($lnaaResponse->getStatusCode() === 200 && $lnaaResponse->getBody()->getContents() === '"Good"') {
                return self::SUCCESS;
            }
            return self::FAILURE;
        } catch (TransferException $ex) {
            $this->logExceptionsMessages($ex);
            return self::FAILURE;
        }
    }

    /**
     * Returns all apps Databases checks
     * @return array Databases status
     */
    private function checkDatabases(): array
    {
        $dbs = [
            'mbs' => 'mbs',
            'application' => 'mysql',
            'utility1' => 'mysql',
            'portfolio1' => 'portfolio_fbi',
            'portfolio2' => 'portfolio_ice',
        ];
        if (in_array(env('APP_ENV'), ['staging', 'prod', 'dr'])) {
            $dbs = array_merge($dbs, [
                'portfolio3' => 'portfolio_flet',
                'portfolio4' => 'portfolio_dcbp',
                'portfolio5' => 'portfolio_dcis',
                'portfolio6' => 'portfolio_dcg1',
                'portfolio7' => 'portfolio_dcg2',
                'portfolio8' => 'portfolio_dfps',
                'portfolio9' => 'portfolio_dcso',
                'portfolio10' => 'portfolio_fema',
                'portfolio11' => 'portfolio_dtsa',
                'portfolio12' => 'portfolio_usss',
                'portfolio13' => 'portfolio_cisa',
                'portfolio14' => 'portfolio_uaid',
            ]);
        }
        $databases = [];
        foreach ($dbs as $dbName => $dbConnection) {
            try {
                if (DB::connection($dbConnection)->getPDO()) {
                    $databases[$dbName] = self::SUCCESS;
                }
            } catch (Exception $e) {
                $this->logExceptionsMessages($e);
                $databases[$dbName] = self::FAILURE;
            }
        }
        return $databases;
    }

    /**
     * Returns Insider Threat ESP check
     */
    private function checkInsiderThreatEsp()
    {
        $endpoint = env('Search_WsInsiderThreatFCRA_END_POINT')
            . '&ver_=' . env('Search_WsInsiderThreatFCRA_VERSION');
        $options = [
            'location' => $endpoint,
            'ns' => env('Search_WsInsiderThreatFCRA_NAMESPACE'),
            'auth' => [
                'username' => env('Search_WsInsiderThreatFCRA_USER_NAME'),
                'password' => env('Search_WsInsiderThreatFCRA_PASWORD'),
            ],
            'resp_timeout' => env('Search_WsInsiderThreatFCRA_TIME_OUT'),
            'ignore_ssl' => (bool) env('Search_WsInsiderThreatFCRA_IGNORE_SSL'),
        ];
        $wsdl = env('Search_WsInsiderThreatFCRA_WSDL')
            . '&ver_=' . env('Search_WsInsiderThreatFCRA_VERSION');
        try {
            $soapClient = new SoapClient($wsdl, $options);
            $methods = array_filter($soapClient->getClient()->__getFunctions(), function ($item) {
                return (strpos($item, 'InsiderThreatEnroll') !== false);
            });
            return (empty($methods)) ? self::FAILURE : self::SUCCESS;
        } catch (SoapFault $ex) {
            $this->logExceptionsMessages($ex);
            return self::FAILURE;
        } catch (Exception $ex) {
            $this->logExceptionsMessages($ex);
            return self::FAILURE;
        }
    }

    /**
     * Determine if there was a failure in the health check, if so, log the response
     * @param $response
     */
    private function logFailedResponses($response)
    {
        foreach ($response as $key => $value) {
            $hasFailure = false;
            if (getType($value) === 'array') {
                foreach ($value as $nestedKey => $nestedValue) {
                    $hasFailure = $nestedValue === self::FAILURE || $hasFailure;
                    if ($hasFailure) {
                        break;
                    }
                }
            } else {
                $hasFailure = $value === self::FAILURE || $hasFailure;
            }
            if ($hasFailure) {
                break;
            }
        }
    }

    public function logExceptionsMessages(Exception $e, $separator = ' ')
    {
        $called_method = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2)[1]['function'];

        $messages = [];
        do {
            $messages[] = $e->getMessage();
        } while ($e = $e->getPrevious());

        $tracex = implode($separator, array_unique($messages, SORT_STRING));

        $prefix = self::LOG_PREFIX . '/' . $called_method . ' ';

        Log::error($prefix . $tracex);
    }
}
