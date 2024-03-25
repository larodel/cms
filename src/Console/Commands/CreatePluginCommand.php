<?php

namespace Larodel\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CreatePluginCommand extends Command
{
    protected $signature = 'plugin:create {name}';

    protected $description = 'Create a new folder inside plugins folder';

    public function handle()
    {
        $name = $this->argument('name');
        $pluginPath = base_path('plugins/' . $name);
 
        if (!File::exists($pluginPath)) {
            File::makeDirectory($pluginPath);
            $this->info("Plugin folder '{$name}' created successfully.");
        } else {
            $this->error("Plugin folder '{$name}' already exists.");
        }
    }
}
