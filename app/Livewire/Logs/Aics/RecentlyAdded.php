<?php

namespace App\Livewire\Logs\Aics;

use Livewire\Component;
use App\Models\AICs;

class RecentlyAdded extends Component
{
    public $latestAICS;

    public function mount()
    {
        // Get latest 10 records
        $this->latestAICS = AICs::latest()->take(10)->get();
    }

    public function render()
    {
        return view('livewire.logs.aics.recently-added');
    }
}
