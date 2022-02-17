<?php

namespace Veldman\Admin\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'admin:install';

    protected $description = '';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        return 0;
    }
}