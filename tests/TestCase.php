<?php

namespace Veldman\Admin\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Veldman\Admin\AdminServiceProvider;

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
            AdminServiceProvider::class
        ];
    }

    protected function defineDatabaseMigrations()
    {
        $this->loadLaravelMigrations();
    }
}