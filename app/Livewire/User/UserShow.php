<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\User;

class UserShow extends Component
{

    public $user;

    public function mount($id)
    {
        $this->user = User::findOrFail($id);
    }
    
    public function render()
    {
        return view('livewire.user.user-show');
    }
}
