<?php

namespace DanteB918\LivewirePdfPreview;

use DanteB918\LivewirePdfPreview\Console\InstallCommand;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class PdfPreviewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Livewire::component('livewire-pdf-preview', LivewirePdfPreview::class);

        $this->publishes([
            __DIR__ . '/../resources/js' => public_path('vendor/livewire-pdf-preview/js'),
            __DIR__ . '/../resources/css' => public_path('vendor/livewire-pdf-preview/css'),
        ], 'livewire-pdf-preview:assets');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'livewire-pdf-preview');

        $this->registerDirectives();
        $this->registerCommands();
    }

    private function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallCommand::class,
            ]);
        }
    }

    private function registerDirectives()
    {
        Blade::directive('livewirePdfPreviewScripts', function () {
            $scriptsUrl = asset('/vendor/livewire-pdf-preview/js/pdf.js');
            $cssUrl = asset('/vendor/livewire-pdf-preview/css/pdf.css');
            return <<<EOF
                    <script src="$scriptsUrl" type="module"></script>
                    <link rel="stylesheet" href="$cssUrl"></link>
                EOF;
        });
    }
}
