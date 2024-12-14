<?php

namespace DanteB918;

use Livewire\Component;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class LivewirePdfPreview extends Component
{
    public ?TemporaryUploadedFile $pdf = null;

    public $base64Pdf = '';

    public function render()
    {
        if ($this->pdf) {
            $this->base64Pdf = base64_encode($this->pdf->get());
        }

        return view('livewire-pdf-preview::livewire-pdf-preview', ['base64Pdf' => $this->base64Pdf]);
    }
}
