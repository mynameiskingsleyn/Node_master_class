<?php

namespace App\Modules\PasswordReset\Mutation;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Services\User\AccountService;
use App\Services\User\PasswordExpirationService;
use App\Services\User\PasswordResetTokenService;
use LNWebAPI2\Framework\Services\Modules\IPasswordResetService;
use Illuminate\Support\Facades\App;
use Closure;

class ResetPasswordMutation extends Mutation
{
    /**
     * @var IPasswordResetService
     */
    protected $passwordResetService;

    /**
     * @var PasswordExpirationService
     */
    private $passwordExpirationService;

    protected $attributes = [
        'name' => 'resetPassword',
        'description' => 'Reset user password'
    ];

    public function type(): Type
    {
        return Type::boolean();
    }

    public function args(): array
    {
        return [
            'input' => [
                'type' => GraphQL::type('ResetPasswordInput')
            ]
        ];
    }

    public function __construct(
        PasswordResetTokenService $passwordResetTokenService,
        PasswordExpirationService $passwordExpirationService
    ) {
        $this->passwordResetService = $passwordResetTokenService;
        $this->passwordExpirationService = $passwordExpirationService;
    }

    /**
     * Reset user's password.
     */
    public function resetPassword($input)
    {
        $parameters = $this->prepareParameters($input);
        $userName = $this->passwordResetService->resetPassword($parameters);
        // Update password expiration date;
        $result = $this->passwordExpirationService->setPasswordExpirationDate($userName, $parameters['sessionId']);
        // Kill LNAA admin session
        App::make(AccountService::class)->logoutSuperAdmin($parameters['sessionId']);

        return true;
    }

    /**
     * Prepares request parameters adding the Session ID from account.
     * @param array $parameters Request parameters
     * @return array Prepared parameters
     */
    private function prepareParameters(array $parameters): array
    {
        $parameters['sessionId'] = App::make(AccountService::class)->getSuperAdminSessionId();
        return $parameters;
    }

    public function resolve($root, array $args, $context, ResolveInfo $info, Closure $getSelectFields)
    {
        return [$this->resetPassword($args['input'])];
    }
}
