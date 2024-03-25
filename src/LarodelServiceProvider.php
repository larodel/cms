<?php

namespace Larodel\Cms;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Larodel\Cms\Console\Commands\PluginGetAllCommand;
use Larodel\Cms\Console\Commands\CreatePluginCommand;

class LarodelServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        $this->:createCommands();
    }

    public function boot()
    {
        $this->:publishFiles();
		$this->registerRoutes();
    }
	
	
	
	//--------------------------------------------
	
	 public  function createCommands()
    {
		$this->commands([
            PluginGetAllCommand::class,
            CreatePluginCommand::class,
        ]);	
	}
	 public  function publishFiles()
    {
        $this->publishes([
            __DIR__.'/config/cms.php' => config_path('cms.php'),
        ], 'larodel-config');

       Artisan::call('vendor:publish', ['--tag' => 'larodel-files']);
    }
	 private function registerRoutes()
    {
        Route::group([
            'namespace' => 'Larodel\Http\Controllers',
            'prefix' => '',
        ], function () {
            $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        });
    }
}
