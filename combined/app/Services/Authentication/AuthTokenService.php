<?php

namespace App\Services\Authentication;

use LNWebAPI2\Plugins\WebTokenAuth\WebTokenAuth;
use LNWebAPI2\Framework\Responses\IResult;
use LNWebAPI2\Plugins\WebTokenAuth\JWT\JWTHandler;
use LNWebAPI2\Plugins\MoLog\Log;
use LNWebAPI2\Plugins\WebTokenAuth\Reponses\WebTokenResponseCodes as AuthResponseCodes;
use LNWebAPI2\Framework\Events\Event;
use LNWebAPI2\Framework\Events\EventTypes;
use LNWebAPI2\Plugins\MoLog\LogScope;
use LNWebAPI2\Plugins\WebTokenAuth\Services\Util;

class AuthTokenService extends WebTokenAuth
{
    /**
     * Login using the user credentials.
     *
     * @param  array Inputs
     * @return IResult
     */
    public function login(array $requestInputs): IResult
    {
        Log::info('Login attempt from IP: ' . Util::getClientIp(), [], $this->getLogChannels());

        $result = $this->provider->login($requestInputs);

        if ($result->getCode() == AuthResponseCodes::SUCCESS) {
            $this->identity = $result->getData();

            if (!$this->hasValidIpRange()) {
                Log::error('Current IP:' . Util::getClientIp() . ' is not authorized', [], $this->getLogChannels());
                $result = $this->createResult(AuthResponseCodes::INVALID_IP, [
                    'Current IP:' . Util::getClientIp() . ' is not authorized'
                ]);
                $event = new Event(EventTypes::LOGIN_ERROR, $this, $result);
                $this->facade->eventDispatcher()->dispatchEvent($event);
                return $result;
            }

            // get company status
            if (isset($this->config['company_status_check']) && $this->config['company_status_check'] === true) {
                $validStatus = $this->checkValidCompanyStatus();
                if ($validStatus !== true) {
                    Log::error(AuthResponseCodes::message(AuthResponseCodes::INVALID_COMPANY_STATUS), [], $this->getLogChannels());
                    $result = $this->createResult(AuthResponseCodes::INVALID_COMPANY_STATUS);
                    $event = new Event(EventTypes::LOGIN_ERROR, $this, $result);
                    $this->facade->eventDispatcher()->dispatchEvent($event);
                    return $result;
                }
            }

            // Checks for JWT settings
            if (!isset($this->config['jwt_settings']) || empty($this->config['jwt_settings'])) {
                Log::error(AuthResponseCodes::message(AuthResponseCodes::TOKEN_SETTINGS_MISSING), [], $this->getLogChannels());
                $result = $this->createResult(AuthResponseCodes::TOKEN_SETTINGS_MISSING);
                $event = new Event(EventTypes::LOGIN_ERROR, $this, $result);
                $this->facade->eventDispatcher()->dispatchEvent($event);
                return $result;
            }

            $uid = $this->facade->securityService()->encrypt($this->identity->getSessionId());

            $token = $this->createHandler()->generateWithRange(
                $uid,
                $this->config['jwt_settings'],
                $this->mbsProvider,
                $this->identity->getUser()->getNvp('gc_id'),
                $this->getIpWhiteList()
            );
            $result->setData($token);

            $event = new Event(EventTypes::LOGIN_SUCCESS, $this, $this->identity);
            $this->facade->eventDispatcher()->dispatchEvent($event);

            Log::info('Login SUCCESS.', [], $this->getLogChannels());

            return $result;
        }
        return $result;
    }

    /**
     * Check if token is valid.
     * @param  string $token (Optional)
     * @return IResult
     */
    public function validate(string $token = null): IResult
    {
        $strToken = $this->getToken($token);
        if (!$strToken) {
            return $this->createResult(AuthResponseCodes::TOKEN_REQUIRED, $token);
        }
        $handler = $this->createHandler();
        $parsedToken = $handler->parse($strToken);
        $tokenValid = $handler->validate($parsedToken, $this->config['jwt_settings']);
        $ipValidRange = $handler->validateIpRange($parsedToken, $this->config['jwt_settings']);

        if ($tokenValid && $ipValidRange) {
            return $this->createResult(AuthResponseCodes::SUCCESS, $strToken);
        }
        if ($tokenValid && !$ipValidRange) {
            Log::error('Token invalid for IP: ' . Util::getClientIp(), [], $this->getLogChannels());
            $this->createResult(AuthResponseCodes::INVALID_IP, $strToken);
        }
        Log::error(AuthResponseCodes::message(AuthResponseCodes::INVALID_IP), [], $this->getLogChannels());
        return $this->createResult(AuthResponseCodes::INVALID_TOKEN, $strToken);
    }

    /**
     * Renew the token.
     *
     * @param string $token
     * @return IResult
     */
    public function renew(string $token = null): IResult
    {
        Log::info('Renew session attempt from IP: ' . Util::getClientIp(), [], $this->getLogChannels());
        $strToken = $this->getToken($token);
        if (!$strToken) {
            Log::error('Renew failed. ' . AuthResponseCodes::message(AuthResponseCodes::TOKEN_REQUIRED), [], $this->getLogChannels());
            return $this->createResult(AuthResponseCodes::TOKEN_REQUIRED);
        }

        // Fetch identity so the GC_ID is available
        $identityResult = $this->identity();
        if ($identityResult->getCode() !== AuthResponseCodes::SUCCESS) {
            Log::error('Error fetching Identity. ' . AuthResponseCodes::message(AuthResponseCodes::INVALID_TOKEN));
            return $this->createResult(AuthResponseCodes::INVALID_TOKEN);
        }

        $handler = $this->createHandler();
        $objectToken = $handler->parse($strToken);

        $uid = $this->facade->securityService()->decrypt($objectToken->getClaim('uid'));
        $result = $this->provider->renew($uid);

        if ($result->getCode() == AuthResponseCodes::SUCCESS) {
            $token = $handler->generateWithRange(
                $uid,
                $this->config['jwt_settings'],
                $this->mbsProvider,
                $this->identity->getUser()->getNvp('gc_id'),
                $this->getIpWhiteList()
            );
            $result->setData($token);

            $event = new Event(EventTypes::LOGIN_SUCCESS, $this, $this->identity);
            $this->facade->eventDispatcher()->dispatchEvent($event);
            Log::info('Renew token SUCCESS.', [], $this->getLogChannels());
            return $result;
        }
        Log::error('Renew token FAILED. ' . $result->getMessage(), [], $this->getLogChannels());
        return $result;
    }

    /**
     * Creates a instance of TokenHandler
     * @return JWTHandler
     */
    protected function createHandler(): JWTHandler
    {
        return new TokenHandler();
    }

    protected function getLogChannels(): array
    {
        return [ LogScope::FILE ];
    }
}
