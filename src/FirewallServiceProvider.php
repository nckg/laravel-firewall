<?php

namespace Getlashified\Firewall;

use Illuminate\Support\ServiceProvider;

class FirewallServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/firewall.php' => config_path('firewall.php'),
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }
}