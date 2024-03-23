<?php

namespace Larodel\Admin;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class LarodelServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerRoutes();
    }

    private function registerRoutes()
    {
        Route::group([
            'namespace' => 'Larodel\Admin\Http\Controllers',
            'prefix' => '',
        ], function () {
            $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        });
    }
}
