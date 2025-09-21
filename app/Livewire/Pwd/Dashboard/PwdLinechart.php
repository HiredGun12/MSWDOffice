<?php

namespace App\Livewire\Pwd\Dashboard;

use Livewire\Component;
use App\Models\Pwd;
use Illuminate\Support\Facades\DB;

class PwdLinechart extends Component
{
    public function pwdDisabilityLineChart()
    {
        // Group by type_of_disability and count each
        $data = Pwd::select('type_of_disability', DB::raw('count(*) as total'))
            ->groupBy('type_of_disability')
            ->get();

        // Format response for Chart.js
        $labels = $data->pluck('type_of_disability');
        $counts = $data->pluck('total');

        return response()->json([
            'labels' => $labels,
            'counts' => $counts
        ]);
    }
    public function render()
    {
        return view('livewire.pwd.dashboard.pwd-linechart');
    }
}
