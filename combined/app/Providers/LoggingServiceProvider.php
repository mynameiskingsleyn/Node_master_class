<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Logging\LogWriter;

class LoggingServiceProvider extends ServiceProvider
{
   /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('writer', function () {
            return new LogWriter();
        });
    }
}
