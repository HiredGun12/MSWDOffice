<?php

namespace App\Livewire\Pwd;

use Livewire\Component;
use App\Models\Pwd;
use Illuminate\Support\Facades\DB;

class PwdDashboard extends Component
{

    

    
    public function render()
    {
        return view('livewire.pwd.pwd-dashboard');
    }
}
