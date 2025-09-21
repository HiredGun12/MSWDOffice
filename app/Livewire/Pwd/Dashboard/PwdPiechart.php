<?php

namespace App\Livewire\Pwd\Dashboard;

use Livewire\Component;
use App\Models\Pwd;

class PwdPiechart extends Component
{
    public function pwdGenderChart()
    {
        $maleCount = Pwd::where('sex', 'Male')->count();
        $femaleCount = Pwd::where('sex', 'Female')->count();

        return response()->json([
            'male' => $maleCount,
            'female' => $femaleCount
        ]);
    }
    public function render()
    {
        return view('livewire.pwd.dashboard.pwd-piechart');
    }
}
