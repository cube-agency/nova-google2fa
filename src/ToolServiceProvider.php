<?php

namespace CubeAgency\NovaGoogle2fa;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Http\Middleware\Authenticate;
use Laravel\Nova\Nova;
use CubeAgency\NovaGoogle2fa\Http\Middleware\Authorize;

class ToolServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'nova-google2fa');
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'nova-google2fa');

        $this->publishes([
            __DIR__ . '/../config/nova-google2fa.php' => config_path('nova-google2fa.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/../resources/assets' => public_path('vendor/nova-google2fa'),
        ], 'public');

        // Publishing the migrations.
        $this->publishes([
            __DIR__ . '/../database/migrations/' => database_path('migrations')
        ], 'migrations');

        $this->app->booted(function () {
            $this->routes();
        });
    }

    /**
     * Register the tool's routes.
     *
     * @return void
     */
    protected function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Nova::router(['nova', Authenticate::class, Authorize::class], 'google2fa')
            ->group(__DIR__ . '/../routes/inertia.php');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/nova-google2fa.php', 'nova-google2fa');
    }
}
