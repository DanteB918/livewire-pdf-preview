<?php

namespace DanteB918\LivewirePdfPreview;

use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class LivewirePdfPreview extends Component
{
    public ?TemporaryUploadedFile $pdf = null;

    public $base64Pdf = '';

    public $worker = null;

    public function render()
    {
        $this->worker ??= asset("/vendor/livewire-pdf-preview/js/pdf.worker.js");

        if ($this->pdf?->getMimeType() == 'application/pdf') {
            $this->base64Pdf = base64_encode($this->pdf->get());
        }

        return view('livewire-pdf-preview::canvas', ['base64Pdf' => $this->base64Pdf]);
    }
}
