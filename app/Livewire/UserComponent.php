<?php

namespace App\Livewire;

use App\Models\Person;
use Livewire\Component;
use Livewire\WithPagination;

class UserComponent extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.user-component', [
            'users' => Person::paginate(5)
        ]);
    }
}
