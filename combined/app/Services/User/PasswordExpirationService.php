<?php

namespace App\Services\User;

use LNWebAPI2\Framework\Services\Modules\Factories\UserManagementService;
use LNWebAPI2\Framework\Services\Modules\IUserManagementService;
use LNWebAPI2\Framework\Responses\ResponseCodes;
use App\Exceptions\PasswordReset\PasswordResetException;

class PasswordExpirationService
{
    /**
     * @var IUserManagementService
     */
    private $userManagementService;

    /**
     *  @return PasswordResetTokenService $passwordReset
     */
    public function __construct(UserManagementService $userManagement)
    {
        $this->userManagementService = $userManagement->getService();
    }

    /**
     * Set Password expiration date based on configuration
     * @param string $userName
     * @param string $adminSessionId sessionId of administrator user
     */
    public function setPasswordExpirationDate(string $userName, string $adminSessionId)
    {
        $params['userName'] = $userName;
        $params['sessionId'] = $adminSessionId;
        $date = new \DateTime(date('Y-m-d'));
        $date->add(new \DateInterval('P' . config('app.expired_password_in_days') . 'D'));
        $params['passwordExpiredDate'] = $date->format('Y-m-d');
        $result = $this->userManagementService->setPasswordExpirationDate($params);
        $code = $result->getCode();
        if ($code !== ResponseCodes::SUCCESS) {
            // TODO: Log here
            throw new PasswordResetException($code, $result->getMessage());
        }
        return $result;
    }
}
