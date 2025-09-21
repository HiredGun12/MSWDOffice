<?php

namespace App\Livewire\Seniorcitizen\Dashboard;

use Livewire\Component;
use App\Models\SeniorCitizen;

class SeniorLinechart extends Component
{
    public function genderLineChart()
    {
        // Define age brackets
        $brackets = [
            '60-69' => [60, 69],
            '70-79' => [70, 79],
            '80-89' => [80, 89],
            '90-99' => [90, 99],
            '100+'  => [100, 200] // upper limit
        ];

        $labels = [];
        $maleData = [];
        $femaleData = [];

        foreach ($brackets as $label => [$minAge, $maxAge]) {
            $labels[] = $label;

            // Count male in bracket
            $maleData[] = SeniorCitizen::where('gender', 'Male')
                ->whereBetween('age', [$minAge, $maxAge])
                ->count();

            // Count female in bracket
            $femaleData[] = SeniorCitizen::where('gender', 'Female')
                ->whereBetween('age', [$minAge, $maxAge])
                ->count();
        }

        return response()->json([
            'labels' => $labels,
            'male' => $maleData,
            'female' => $femaleData
        ]);
    }

    public function render()
    {
        return view('livewire.seniorcitizen.dashboard.senior-linechart');
    }
}
