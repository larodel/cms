<?php

namespace Larodel\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class PluginGetAllCommand extends Command
{
    protected $signature = 'plugin:get_all';

    protected $description = 'Get list of folders inside the plugins folder';

    public function handle()
    {
        $pluginsPath = base_path('plugins');

        if (File::exists($pluginsPath) && File::isDirectory($pluginsPath)) {
            $folders = File::directories($pluginsPath);
            $this->info('List of folders inside plugins folder:');
            foreach ($folders as $folder) {
                $this->line(basename($folder));
            }
        } else {
            $this->error('Plugins folder does not exist or is not a directory.');
        }
    }
}
