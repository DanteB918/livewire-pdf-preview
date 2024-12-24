[![GitHub release](https://img.shields.io/github/release/DanteB918/livewire-pdf-preview.svg)](https://github.com/DanteB918/livewire-pdf-preview/releases/)

## Example

![livewire-pdf-preview-gif-2](https://github.com/user-attachments/assets/46649179-986c-47f8-90a2-d1a972f623f7)

## Installation

You can install the package via composer:

```bash
composer require danteb918/livewire-pdf-preview
```

Please skip the next few installation steps if your application already has PDF.js installed.

Next, you must export the package public scripts. To do this run 

```bash
php artisan livewire-pdf-previewer:install
```

This command will export a `vendor/livewire-pdf-preview` folder under the `public` directory of your app which is used by the `@livewirePdfPreviewScripts` directive.

include the `@livewirePdfPreviewScripts` directive next to your other app scripts

```blade
@livewireScripts
@livewirePdfScripts
```

## Requirements

This package requires the following packages/libraries to work:
- `Laravel Livewire v3` (https://livewire.laravel.com/)
- `PDF.js` (https://mozilla.github.io/pdf.js/)

Please follow each package/library instructions on how to set them properly in your project.

>Note: if you run the installation command and added the directives, that installs PDF.js.

## Usage

You'll have a livewire component with an upload field, then the canvas, like so:

```blade
    <input wire:model="document" type="file" name="document" />

    <livewire:livewire-pdf-preview key="{{ now() }}" :pdf="$document" />
```

Be sure that your component has the `WithFileUploads` trait, if you are using Livewire file uploads. More information can be found [in the Livewire documentation.](https://livewire.laravel.com/docs/uploads#storing-uploaded-files)

It's preferred to always have the `key` attribute for this component so that it will re-render any time the PDF has been changed.


## Contributing

Feel free to open Pull requests with bug fixes and features. I'll do my best to keep an eye on those.
Feel free to open issues with bug reports or feature requests. Bug fixes will take priority.
I welcome contributions from the community and look forward to working with you to improve this project.

### Contributors

<a href="https://github.com/DanteB918/livewire-pdf-preview/graphs/contributors">
  <img src="https://contrib.rocks/image?repo=DanteB918/livewire-pdf-preview" />
</a>
