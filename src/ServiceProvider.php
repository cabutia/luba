<?php

namespace GRG\Luba;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    public function boot ()
    {
        $this->registerViews();
        $this->registerMigrations();
        $this->registerTranslations();
    }

    public function register ()
    {
        $this->registerConfig();
        $this->registerRoutes();
    }

    /**
     * Register the package's translation strings
     * @return void
     */
    public function registerTranslations ()
    {
        $this->loadTranslationsFrom(__DIR__ . '/Lang', 'luba');
    }

    /**
     * Register the package's migrations
     * @return void
     */
    protected function registerMigrations ()
    {
        $this->loadMigrationsFrom(__DIR__.'/Database/Migrations');
    }

    /**
     * Register the package's views
     * @return void
     */
    protected function registerViews ()
    {
        $this->loadViewsFrom(__DIR__.'/Resources/Views', 'luba');
    }

    /**
     * Register the package's configuration
     * @return void
     */
    protected function registerConfig ()
    {
        $this->mergeConfigFrom(__DIR__.'/Config/package.php', 'luba');
        $this->mergeConfigFrom(__DIR__.'/Config/navigation.php', 'luba::navigation');
    }

    /**
     * Register the package's routes.
     * @return void
     */
    protected function registerRoutes ()
    {
        if (!config('luba.routes.provider')) return false;
        $prefix = config('luba.routes.prefix');
        $middlewares = config('luba.routes.middlewares');
        \Route::prefix($prefix)
            ->middleware($middlewares)
            ->namespace('GRG\\Luba\\Controllers')
            ->group(__DIR__.'/Routes/web.php');
    }
}
