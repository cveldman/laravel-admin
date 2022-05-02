<?php

namespace Veldman\Admin\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Veldman\Admin\AdminServiceProvider;
use Veldman\Components\ComponentsServiceProvider;
use Veldman\DataTable\DataTableServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutMix();
    }

    protected function getPackageProviders($app)
    {
        return [
            AdminServiceProvider::class,
            ComponentsServiceProvider::class,
            DataTableServiceProvider::class
        ];
    }

    protected function defineDatabaseMigrations()
    {
        $this->loadLaravelMigrations();
    }
}