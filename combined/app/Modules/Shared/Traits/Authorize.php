<?php

namespace App\Modules\Shared\Traits;

use GraphQL\Type\Definition\ResolveInfo;
use App\Services\User\AccountService;
use Illuminate\Support\Facades\App;
use App\Exceptions\Authorization\AuthorizationCodes;
use Closure;

/**
 * Ignore this trait from unit testing since the functions
 * are overriden in the classes that using this trait
 */
trait Authorize
{
    /**
     * Override the authorize() function to be used in a Query or Mutation
     * as 'auth' middleware of Lumen
     *
     * @param  array   $args
     * @return boolean
     */
    public function authorize($root, array $args, $ctx, ResolveInfo $resolveInfo = null, Closure $getSelectFields = null): bool
    {
        App::make(AccountService::class)->validateToken();
        return true;
    }

    public function getAuthorizationMessage(): string
    {
        return AuthorizationCodes::message(AuthorizationCodes::ACTION_NOT_ALLOWED);
    }
}
