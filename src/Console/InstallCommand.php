<?php

namespace DanteB918\LivewirePdfPreview\Console;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'livewire-pdf-previewer:install';

    protected $description = 'Installs Livewire PDF Previewer';

    public function handle()
    {
        $this->call('vendor:publish', ['--tag' => 'livewire-pdf-preview:assets']);
    }
}
