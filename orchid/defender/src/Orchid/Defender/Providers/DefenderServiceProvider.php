<?php

namespace Orchid\Defender\Providers;

use Illuminate\Support\ServiceProvider;
use Orchid\Defender\Console\Scan;
use Orchid\Defender\Middleware\Firewall;

class DefenderServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Boot the application events.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../Config/defender.php' => config_path('defender.php'),
        ]);

        app('router')->middleware('Firewall', Firewall::class);
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->commands(Scan::class);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
