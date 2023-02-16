<?php

namespace App\Services\UserManagement;

use App\Services\User\AccountService;
use Illuminate\Support\Facades\App;
use LNWebAPI2\Framework\Services\Modules\Factories\UserManagementService as BaseUserManagementService;
use LNWebAPI2\Framework\Entities\Identity;
use LNWebAPI2\Framework\Services\Modules\IUserManagementService;
use LNWebAPI2\Framework\Responses\IResult;

class UserManagementService
{
    /**
     * @var IUserManagementService
     */
    private $userManagementService;

    /**
     *  @return PasswordResetTokenService $passwordReset
     */
    public function __construct(BaseUserManagementService $userManagement)
    {
        $this->userManagementService = $userManagement->getService();
    }

    /**
     * Returns the user session id
     * @return string
     */
    public function getUserSessionId(): string
    {
        $account = App::make(AccountService::class)->getAccount();
        $sessionID = $account->getSessionId();
        return $sessionID;
    }

    /**
     * Returns the NVP ID based on the NVP name provided
     * @param $nvps List of nvps
     * @param $nvpName NVP to look for.
     * @return string Found NVP ID
     */
    public function getNVPKeyId(array $nvps, string $nvpName): string
    {
        $foundNvpID = false;
        foreach ($nvps as $nvp) {
            if ($nvp->getName() === $nvpName) {
                $foundNvpID = $nvp->getID();
            }
        }
        return $foundNvpID;
    }

    public function setSubjectLexId(string $lexId): IResult
    {
        $account = App::make(AccountService::class)->getAccount();
        $nvps = $account->getUser()->getNvps();
        $sessionID = $this->getUserSessionId();
        $nvpKeyId = $this->getNVPKeyId($nvps, config('app.registration_nvp'));
        $result = $this->userManagementService->userUpdateNvps(
            [['nvp_id' => $nvpKeyId, 'nvp_value' => $lexId]],
            $sessionID
        );
        return $result;
    }
}
