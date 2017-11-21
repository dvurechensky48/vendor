<?php

namespace Orchid\CMS\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Orchid\CMS\Core\Models\Page;
use Orchid\CMS\Core\Models\Post;
use Orchid\CMS\Core\Models\TermTaxonomy;
use Orchid\Platform\Http\Middleware\CanInstall;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'Orchid\CMS\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @internal param Router $router
     */
    public function boot()
    {
        Route::middlewareGroup('install', [
            CanInstall::class,
        ]);

        $this->binding();

        parent::boot();
    }

    /**
     * Route binding.
     */
    public function binding()
    {
        Route::bind('category', function ($value) {
            return TermTaxonomy::findOrFail($value);
        });

        Route::bind('type', function ($value) {
            $post = new Post();
            $type = $post->getBehavior($value)->getBehaviorObject();

            return $type;
        });

        Route::bind('slug', function ($value) {
            if (is_numeric($value)) {
                return Post::where('id', $value)->firstOrFail();
            }

            return Post::findOrFail($value);
        });

        Route::bind('page', function ($value) {
            if (is_numeric($value)) {
                $page = Page::where('id', $value)->first();
            } else {
                $page = Page::where('slug', $value)->first();
            }
            if (is_null($page)) {
                return new Page([
                    'slug' => $value,
                ]);
            }

            return $page;
        });

        Route::bind('advertising', function ($value) {
            if (is_numeric($value)) {
                return Post::type('advertising')->where('id', $value)->firstOrFail();
            }

            return Post::type('advertising')->where('slug', $value)->firstOrFail();
        });
    }

    /**
     * Define the routes for the application.
     */
    public function map()
    {
        foreach (glob(CMS_PATH . '/routes/*/*.php') as $file) {
            $this->loadRoutesFrom($file);
        }
    }
}
