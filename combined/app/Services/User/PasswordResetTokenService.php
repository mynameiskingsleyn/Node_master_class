<?php

namespace App\Services\User;

use LNWebAPI2\Framework\Services\Modules\Factories\PasswordResetService;
use LNWebAPI2\Plugins\PasswordReset\PasswordReset;
use App\Exceptions\PasswordReset\PasswordResetException;
use App\Exceptions\PasswordReset\PasswordResetCodes;

class PasswordResetTokenService
{
    /**
     * @var PasswordReset
     */
    protected $passwordResetService;

    /**
     *  @return PasswordResetTokenService $passwordReset
     */
    public function __construct(PasswordResetService $passwordReset)
    {
        $this->passwordResetService = $passwordReset->getService();
    }

    /**
     * Get Unique token for the selected user.
     * @param  array $parameters [sessionId, userName]
     * @return array token information [token, email]
     */
    public function getUniqueToken(array $parameters)
    {
        $result = $this->passwordResetService->requestUniqueToken($parameters);
        $code = $result->getCode();
        if ($code !== PasswordResetCodes::SUCCESS) {
            throw new PasswordResetException($code, $result->getMessage());
        }
        return $result->getData();
    }

    public function resetPassword(array $parameters)
    {
        // Check if token is still valid
        $validToken = $this->passwordResetService->validateToken($parameters);
        $validTokenCode = $validToken->getCode();
        if ($validTokenCode !== PasswordResetCodes::SUCCESS) {
            throw new PasswordResetException($validTokenCode, $validToken->getMessage());
        }
        $userName = $validToken->getData()->getUsername();
        // Change the password of the user
        $result = $this->passwordResetService->resetPassword($parameters);
        $code = $result->getCode();
        if ($code !== PasswordResetCodes::SUCCESS) {
            throw new PasswordResetException($code, $result->getMessage());
        }
        return $userName;
    }
}
