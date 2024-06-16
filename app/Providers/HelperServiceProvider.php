<?php

namespace App\Providers;

use App\Helpers\AppHelper;
use Illuminate\Support\ServiceProvider;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('apphelper', function() {
            return new AppHelper;
        });
    }
}
