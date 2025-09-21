<?php

namespace App\Livewire\Pwd;

use Livewire\Component;
use App\Models\Pwd;

class PwdInfo extends Component
{
    public $pwd;

    public function mount($id)
    {
        $this->pwd = Pwd::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.pwd.pwd-info');
    }
}
