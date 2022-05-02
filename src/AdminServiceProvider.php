<?php

namespace Veldman\Admin;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Laravel\Ui\UiCommand;
use Veldman\Admin\View\Components\Error;
use Veldman\Admin\View\Components\Form;
use Veldman\Admin\View\Components\Input;
use Veldman\Admin\View\Components\Label;
use Veldman\Admin\View\Components\Select;

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

            $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

            UiCommand::macro('tall', function (UiCommand $command) {
                \Veldman\Admin\Presets\Tailwind::install();
                \Veldman\Admin\Presets\Vue::install();

                $this->info('Vue scaffolding installed successfully.');
                $this->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
            });
        }

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'admin');

        $this->loadTranslationsFrom(__DIR__.'/../lang', 'admin');

        Blade::component('form', Form::class);
        Blade::component('input', Input::class);
        Blade::component('select', Select::class);
        Blade::component('label', Label::class);
        Blade::component('error', Error::class);


    }
}
