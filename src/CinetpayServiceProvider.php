<?php

namespace Taariam\Cinetpay;

use Illuminate\Support\ServiceProvider;

class CinetpayServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('cinetpay', function ($app) {
            return new Cinetpay();
        });
    }

    public function boot()
    {
        // Publier la configuration
        $this->publishes([
            __DIR__ . '/../config/cinetpay.php' => config_path('cinetpay.php'),
        ]);
    }
}
