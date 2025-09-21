<?php

namespace App\Livewire\Seniorcitizen\Dashboard;

use Livewire\Component;
use App\Models\SeniorCitizen;

class SeniorPiechart extends Component
{
    public function seniorAgeChart()
    {
        return response()->json([
            'age_60'  => SeniorCitizen::where('age', '>=', 60)->where('age', '<', 90)->count(),
            'age_90'  => SeniorCitizen::where('age', '>=', 90)->where('age', '<', 95)->count(),
            'age_95'  => SeniorCitizen::where('age', '>=', 95)->where('age', '<', 100)->count(),
            'age_100' => SeniorCitizen::where('age', '>=', 100)->count(),
        ]);
    }
    public function render()
    {
        return view('livewire.seniorcitizen.dashboard.senior-piechart');
    }
}
