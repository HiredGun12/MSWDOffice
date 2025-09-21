<?php

namespace App\Livewire\Soloparent\Dashboard;

use Livewire\Component;
use App\Models\SoloParent;

class SoloparentPiechart extends Component
{

    public $maleCount;
    public $femaleCount;

    public function mount()
    {
        // Count males and females
        $this->maleCount = SoloParent::where('sex', 'Male')->count();
        $this->femaleCount = SoloParent::where('sex', 'Female')->count();
    }
    public function render()
    {
        return view('livewire.soloparent.dashboard.soloparent-piechart');
    }
}
