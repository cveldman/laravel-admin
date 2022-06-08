<?php

namespace Veldman\Admin;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Veldman\Admin\View\Components\Error;
use Veldman\Admin\View\Components\Form;
use Veldman\Admin\View\Components\Input;
use Veldman\Admin\View\Components\Label;
use Veldman\Admin\View\Components\Select;
use Veldman\Admin\View\Components\Sidebar\Group;
use Veldman\Admin\View\Components\Sidebar\Item;
use Veldman\Admin\View\Components\Table;
use Veldman\Admin\View\Components\TD;
use Veldman\Admin\View\Components\TH;

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
        }

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'admin');

        $this->loadTranslationsFrom(__DIR__.'/../lang', 'admin');

        // Table components
        Blade::component('table', Table::class);
        Blade::component('th', TH::class);
        Blade::component('td', TD::class);

        // Form components
        Blade::component('form', Form::class);
        Blade::component('input', Input::class);
        Blade::component('select', Select::class);
        Blade::component('label', Label::class);
        Blade::component('error', Error::class);

        Blade::component('sidebar.item', Item::class);
        Blade::component('sidebar.group', Group::class);
    }
}
