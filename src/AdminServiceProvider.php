<?php

namespace Veldman\Admin;

use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    public function register()
    {
        // $this->mergeConfigFrom(__DIR__.'/../config/admin.php', 'admin');

        $this->app->singleton('sidebar', function ($app) {
            return new Sidebar();
        });
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            // $this->commands([InstallCommand::class]);

            // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        }

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'admin');

        $this->loadTranslationsFrom(__DIR__.'/../lang', 'admin');
    }
}
