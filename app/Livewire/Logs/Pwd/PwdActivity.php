<?php

namespace App\Livewire\Logs\Pwd;

use Livewire\Component;
use App\Models\PWD;

class PwdActivity extends Component
{
    public function render()
    {
        // Fetch 10 most recent records, newest first
        $pwd = PWD::orderBy('created_at', 'desc')->take(10)->get();

        return view('livewire.logs.pwd.pwd-activity', compact('pwd'));
    }
}
