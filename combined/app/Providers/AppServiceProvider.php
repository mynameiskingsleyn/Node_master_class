<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Services\Common\DateService;
use App\Services\ACL\AclService;
use App\Http\Formatters\JsonResponse;
use App\Services\User\AccountService;
use LNWebAPI2\Framework\LnWebFacade;
use LNWebAPI2\Framework\Services\Modules\Factories\AuthService;
use App\Services\Common\MaskingService;
use App\Services\Common\ConnectionService;
use Tests\Mock\Services\Modules\Factories\MockAuthService;
use Illuminate\Support\Facades\App;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        View::addLocation(resource_path());

        $this->app->singleton(DateService::class, function ($app) {
            return new DateService();
        });

        $this->app->singleton(AclService::class, function ($app) {
            $accountService = $app->make(AccountService::class);
            if (!$accountService) {
                $authService = new AuthService();
                $jsonResponse = new JsonResponse();
                $accountService = new AccountService($authService, $jsonResponse, LnWebFacade::instance());
            }
            return new AclService($accountService);
        });

        $this->app->singleton(MaskingService::class, function ($app) {
            return new MaskingService();
        });

        $this->app->singleton(ConnectionService::class, function ($app) {
            $authService = new AuthService();
            return new ConnectionService($app, $authService);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
