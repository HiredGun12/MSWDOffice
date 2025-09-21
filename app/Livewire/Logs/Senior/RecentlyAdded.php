<?php

namespace App\Livewire\Logs\Senior;

use Livewire\Component;
use App\Models\SeniorCitizen;

class RecentlyAdded extends Component
{
    public function render()
    {
        // ✅ Fetch 10 most recently added senior citizens
        $recentSeniorCitizens = SeniorCitizen::latest()->take(10)->get();

        return view('livewire.logs.senior.recently-added', [
            'recentSeniorCitizens' => $recentSeniorCitizens,
        ]);
    }
}
