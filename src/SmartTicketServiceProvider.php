<?php

namespace Hamiddj\SmartTicket;
use Illuminate\Support\ServiceProvider;

class SmartTicketServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadViewsFrom(__DIR__.'/views','smartTicket');
        $this->loadRoutesFrom(__DIR__.'/route.php');
        $this->publishes([
            __DIR__.'/views' => resource_path('views/vendor/smartTicket'),
        ]);
        $this->publishes([
            __DIR__.'/config.php' => config_path('smartticket.php'),
        ]);
    }

    public function register()
    {

    }
}