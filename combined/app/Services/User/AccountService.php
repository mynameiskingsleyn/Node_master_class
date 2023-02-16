<?php

namespace App\Services\User;

use LNWebAPI2\Framework\Services\Modules\Factories\AuthService;
use LNWebAPI2\Framework\IFrameworkFacade;
use LNWebAPI2\Framework\Entities\Identity;
use LNWebAPI2\Framework\Services\Modules\IAuthService;
use App\Exceptions\Authentication\AuthenticationCodes as AccountCodes;
use App\Exceptions\Authentication\AuthenticationException;
use App\Exceptions\Authentication\RestAuthenticationException;
use LNWebAPI2\Framework\Providers\ProviderResponseCodes;
use LNWebAPI2\Plugins\WebTokenAuth\Services\Util;
use LNWebAPI2\Plugins\MoLog\Log;

class AccountService
{
    const EMPLOYEE_ID = 'EmployeeID';
    const GC_ID = 'gc_id';

    /**
     * @var IAuthService
     */
    private $authService;

    /**
     * @var IAuthProvider
     */
    private $authProvider;

    /**
     * @var Identity
     */
    private $identity;

    private static $activeModule;

    /**
     * @param AuthService $factory
     * @param IFrameworkFacade $facade
     * @param Identity $identity
     */
    public function __construct(
        AuthService $factory,
        IFrameworkFacade $facade,
        Identity $identity = null
    ) {
        $this->authService = $factory->getService();
        $this->authProvider = $facade->providerFactory()->createProvider(
            config('Authentication.provider'),
            config('Authentication.provider_params')
        );
        $this->identity = $identity;
    }

    public function login($parameters, $restful = false)
    {
        $result = $this->authService->login($parameters);
        $code = $result->getCode();
        if ($code !== AccountCodes::SUCCESS) {
            $message = $result->getMessage();
            Log::info(__METHOD__ . ' - ' . $message . ' - Client IP: ' . Util::getClientIp());
            if (!$restful) {
                throw new AuthenticationException($code, $message);
            } else {
                throw new RestAuthenticationException($code, $message);
            }
        }
        return $result;
    }

    public function validateToken(string $token = null)
    {
        $result = $this->authService->validate($token);
        $code = $result->getCode();
        if ($code !== AccountCodes::SUCCESS) {
            throw new AuthenticationException($code, $result->getMessage());
        }
        return $result->getData();
    }

    /**
     * @param string|null $token
     * @return Identity|mixed
     */
    public function getAccount(string $token = null)
    {
        $result = $this->authService->identity($token);
        $code = $result->getCode();
        if ($code !== AccountCodes::SUCCESS) {
            throw new AuthenticationException($code, $result->getMessage());
        }
        return $result->getData();
    }

    public function logout(string $token = null)
    {
        return $this->authService->logout($token);
    }

    public function renew()
    {
        $result = $this->authService->renew();
        $code = $result->getCode();
        if ($code !== AccountCodes::SUCCESS) {
            throw new AuthenticationException($code, $result->getMessage());
        }
        return $result;
    }

    /**
     * Authenticate the Super Admin User
     *
     * @param AccountService $accountService
     * @return string session_id
     */
    public function getSuperAdminSessionId(): string
    {
        $result = $this->authProvider->login(config('app.super_admin'));
        $code = $result->getCode();
        if ($code !== ProviderResponseCodes::SUCCESS) {
            // TODO: Log here
            throw new AuthenticationException($code, $result->getMessage());
        }
        return $result->getData()->getSessionId();
    }

    /**
     * Logout the Super Admin User
     *
     * @param string $token
     */
    public function logoutSuperAdmin(string $sessionId)
    {
        $this->authProvider->logout($sessionId);
    }

    /**
     * Returns user's name with no domain to be used as watcher
     * @return string username
     */
    public function currentWatcher()
    {
        return strstr($this->getAccount()
            ->getUser()
            ->getUserInfo()
            ->getUserName(), '@', true);
    }

    /**
     * Returns user's email to be used as watcher
     * @return string email
     */
    public function emailWatcher()
    {
        return $this->getAccount()
            ->getUser()
            ->getUserInfo()
            ->getEmail();
    }

    /**
     * Returns user's employee id nvp
     * @return string employeeId
     */
    public function employeeId()
    {
        return $this->getAccount()
            ->getUser()
            ->getNvp(self::EMPLOYEE_ID);
    }

    public function activeModule(): string
    {
        if (!self::$activeModule) {
            self::$activeModule = $this->getAccount()
            ->getUser()
            ->getNvp(config('app.active_module'));
        }

        return self::$activeModule ? strtolower(self::$activeModule) : null;
    }

    /**
     * Returns user's employee id nvp
     * @return string employeeId
     */
    public function gcId()
    {
        return $this->getAccount()
            ->getUser()
            ->getNvp(self::GC_ID);
    }
}
