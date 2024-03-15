<?php

namespace App\Livewire;

use App\Models\Person;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class UserComponent extends Component
{
    use WithPagination;

    #[On('person-created')]
    public function updateList(?array $person = null): void
    {
        
    }

    public function render(): View
    {
        return view('livewire.user-component', [
            'users' => Person::latest()->paginate(5)
        ]);
    }
}
