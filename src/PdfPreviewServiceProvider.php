<?php

namespace DanteB918\LivewirePdfPreview;

use DanteB918\LivewirePdfPreview;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class PdfPreviewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Livewire::component('livewire-pdf-preview', LivewirePdfPreview::class);

        // Define publishable assets
        $this->publishes([
            __DIR__ . '../resources/js' => public_path('vendor/livewire-pdf-preview/js'),
            __DIR__ . '../resources/css' => public_path('vendor/livewire-pdf-preview/css'),

        ], 'livewire-pdf-preview-assets');

        $this->loadViewsFrom(__DIR__ . '../resources/views', 'livewire-pdf-previewer');
    }
}
