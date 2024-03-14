<?php

namespace App\Livewire;

use App\Models\Person;
use Illuminate\Http\UploadedFile;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class FileUploadForm extends Component
{
    use WithFileUploads;

    #[Validate('required|min:3|max:150')]
    public string $name = '';

    #[Validate('required|email|unique:people')]
    public string $email = '';

    #[Validate('required|min:6|max:20')]
    public string $password = '';

    #[Validate('nullable|sometimes|file|max:1024')]
    public ?UploadedFile $image = null;

    public function submit(): void
    {
        $validated = $this->validate();

        
        if($this->image){
            $validated['image'] = $this->image->store('uploads', 'public');
        }

        Person::create($validated);

        $this->reset(['name', 'email', 'password', 'image']);

        request()->session()->flash('success', 'Person created successfully!');
    }

    public function render(): View
    {
        return view('livewire.file-upload-form');
    }
}
