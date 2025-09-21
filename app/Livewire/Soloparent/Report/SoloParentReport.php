<?php

namespace App\Livewire\Soloparent\Report;

use Livewire\Component;
use App\Models\SoloParent;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SoloParentReport extends Component
{
    public function render()
    {
        // Counts
        $maleCount   = SoloParent::where('sex', 'Male')->count();
        $femaleCount = SoloParent::where('sex', 'Female')->count();
        $total       = $maleCount + $femaleCount;

        // Civil Status
        $civilStatuses = SoloParent::select('civil_status', DB::raw('COUNT(*) as count'))
            ->groupBy('civil_status')
            ->get();

        // Age Groups
        $ageGroups = [
            '18-25' => SoloParent::whereBetween('age', [18, 25])->count(),
            '26-35' => SoloParent::whereBetween('age', [26, 35])->count(),
            '36-45' => SoloParent::whereBetween('age', [36, 45])->count(),
            '46-60' => SoloParent::whereBetween('age', [46, 60])->count(),
            '60+'   => SoloParent::where('age', '>', 60)->count(),
        ];

        return view('livewire.soloparent.report.solo-parent-report', compact(
            'maleCount',
            'femaleCount',
            'total',
            'civilStatuses',
            'ageGroups'
        ));
    }
}
