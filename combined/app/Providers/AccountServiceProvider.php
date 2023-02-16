<?php

namespace App\Providers;

use App\Http\Formatters\JsonResponse;
use App\Services\User\AccountService;
use Illuminate\Support\ServiceProvider;
use LNWebAPI2\Framework\LnWebFacade;
use LNWebAPI2\Framework\Services\Modules\Factories\AuthService;

class AccountServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(AccountService::class, function ($app) {
            $authService = new AuthService();
            return new AccountService($authService, LnWebFacade::instance());
        });
    }
}
