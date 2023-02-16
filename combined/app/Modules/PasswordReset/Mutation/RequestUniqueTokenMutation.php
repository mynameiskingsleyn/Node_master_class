<?php

namespace App\Modules\PasswordReset\Mutation;

use GraphQL\Type\Definition\ResolveInfo;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Mutation;
use Rebing\GraphQL\Support\Facades\GraphQL;
use App\Mail\PasswordReset;
use App\Services\User\AccountService;
use Illuminate\Support\Facades\Mail;
use App\Services\User\PasswordResetTokenService;
use LNWebAPI2\Framework\Services\Modules\IPasswordResetService;
use Illuminate\Support\Facades\App;
use Swift_TransportException;
use App\Exceptions\PasswordReset\PasswordResetException;
use App\Exceptions\PasswordReset\PasswordResetCodes;
use Closure;

class RequestUniqueTokenMutation extends Mutation
{
    /**
     * @var IPasswordResetService
     */
    protected $passwordResetService;

    public function __construct(PasswordResetTokenService $passwordResetTokenService)
    {
        $this->passwordResetService = $passwordResetTokenService;
    }

    protected $attributes = [
        'name' => 'requestUniqueToken',
        'description' => 'Request unique token for password reset'
    ];

    public function type(): Type
    {
        return Type::boolean();
    }

    public function args(): array
    {
        return [
            'input' => [
                'type' => GraphQL::type('RequestUniqueTokenInput')
            ]
        ];
    }

    /**
     * Request an unique token to be used in the password reset process.
     */
    public function requestUniqueToken($args)
    {
        $parameters = $this->prepareParameters($args);
        $data = $this->passwordResetService->getUniqueToken($parameters);
        $userEmail = $data['email'];
        $token = $data['token'];

        try {
            Mail::to($userEmail)->send(new PasswordReset($token));
        } catch (Swift_TransportException $ex) {
            throw new PasswordResetException(PasswordResetCodes::MAIL_SEND_ERROR, $ex->getMessage());
        }

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
        return [$this->requestUniqueToken($args['input'])];
    }
}
