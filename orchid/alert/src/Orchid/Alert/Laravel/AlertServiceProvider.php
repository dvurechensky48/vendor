<?php

namespace Orchid\Alert\Laravel;

use Illuminate\Support\ServiceProvider;
use Orchid\Alert\Alert;
use Orchid\Alert\Contracts\SessionStoreInterface;

/**
 * Class AlertServiceProvider.
 *
 * @category PHP
 */
class AlertServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->bind(SessionStoreInterface::class, LaravelSessionStore::class);

        $this->app->singleton('alert', function () {
            return $this->app->make(Alert::class);
        });
    }

    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        //
    }
}
