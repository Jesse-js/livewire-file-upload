<?php

namespace App\Livewire;

use App\Models\Person;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class FileUploadForm extends Component
{
    #[Validate('required|min:3|max:150')]
    public string $name = '';

    #[Validate('required|email|unique:people')]
    public string $email = '';

    #[Validate('required|min:6|max:20')]
    public string $password = '';

    public function submit(): void
    {
        $validated = $this->validate();

        Person::create($validated);

        $this->reset(['name', 'email', 'password']);

        request()->session()->flash('success', 'Person created successfully!');
    }

    public function render(): View
    {
        return view('livewire.file-upload-form');
    }
}
