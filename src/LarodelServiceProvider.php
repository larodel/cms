<?php

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Larodel\Cms\Console\Commands\PluginGetAllCommand;
use Larodel\Cms\Console\Commands\CreatePluginCommand;

class ServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        // Registering package commands
        $this->commands([
            PluginGetAllCommand::class,
            CreatePluginCommand::class,
        ]);
    }

    public function boot()
    {
        // Bootstrap code here
    }
}
