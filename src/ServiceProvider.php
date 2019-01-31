<?php

namespace GRG\Luba;

use \Spatie\BladeX\Facades\BladeX;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    public function boot ()
    {
        $this->registerViews();
        $this->registerMigrations();
        $this->registerTranslations();
        $this->registerComponents();
        $this->registerFiles();
        $this->registerCommands();
    }

    public function register ()
    {
        $this->registerConfig();
        $this->registerRoutes();
    }

    /**
     * Register the package commands
     * @return void
     */
    protected function registerCommands ()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\LubaSeeder::class
            ]);
        }
    }

    /**
     * Register the files that will be published
     * @return void
     */
    public function registerFiles ()
    {
        $this->publishes([
            __DIR__ . '/Resources/Assets/dist' => public_path('vendor/luba')
        ], 'assets');
    }

    /**
     * Register the package's blade custom components
     * @return void
     */
    public function registerComponents ()
    {
        $components = config('luba::components');
        foreach ($components as $file => $component) {
            $tag = $component['tag'];
            BladeX::component('luba-components::'. $file)->tag('luba-' . $tag);
        }
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
        $this->loadViewsFrom(__DIR__.'/Resources/Components', 'luba-components');
    }

    /**
     * Register the package's configuration
     * @return void
     */
    protected function registerConfig ()
    {
        $this->mergeConfigFrom(__DIR__.'/Config/package.php', 'luba');
        $this->mergeConfigFrom(__DIR__.'/Config/navigation.php', 'luba::navigation');
        $this->mergeConfigFrom(__DIR__.'/Config/components.php', 'luba::components');
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
            ->as('luba::')
            ->group(__DIR__.'/Routes/web.php');
    }
}
