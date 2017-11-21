<?php

namespace Orchid\CMS\Providers;

use Illuminate\Support\ServiceProvider;

class ConsoleServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Parent command namespace.
     *
     * @var string
     */
    protected $namespace = 'Orchid\\CMS\\Console\\';

    /**
     * The available command shortname.
     *
     * @var array
     */
    protected $commands = [
        'Commands\\MakeManyBehavior',
        'Commands\\MakeSingleBehavior',
        'Commands\\MakeFilter',
    ];

    /**
     * Register the commands.
     */
    public function register()
    {
        foreach ($this->commands as $command) {
            $this->commands($this->namespace . $command);
        }
    }

    /**
     * @return array
     */
    public function provides(): array
    {
        $provides = [];
        foreach ($this->commands as $command) {
            $provides[] = $this->namespace . $command;
        }

        return $provides;
    }
}
