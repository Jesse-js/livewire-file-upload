<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class FileUploadForm extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';


    public function render(): View
    {
        return view('livewire.file-upload-form');
    }
}
