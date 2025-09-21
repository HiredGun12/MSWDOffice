<?php

namespace App\Livewire\Aics\Dashboard;

use Livewire\Component;
use App\Models\AICs;
use Illuminate\Support\Facades\DB;

class AicsPiechart extends Component
{
    public $chartData = [];

    public function mount()
    {
        // Group by purpose and sum amounts
        $data = AICs::select(
            DB::raw('purpose'),
            DB::raw('SUM(amount) as total_amount')
        )
            ->whereIn('purpose', ['Medical', 'Financial', 'Burial', 'None'])
            ->groupBy('purpose')
            ->get();

        // Prepare labels and data for Chart.js
        $labels = $data->pluck('purpose');
        $values = $data->pluck('total_amount');

        $this->chartData = [
            'labels' => $labels,
            'datasets' => [[
                'data' => $values,
                'backgroundColor' => [
                    '#4CAF50', // Medical
                    '#2196F3', // Financial
                    '#FFC107', // Burial
                    '#9E9E9E', // None
                ],
                'hoverOffset' => 10
            ]]
        ];
    }
    public function render()
    {
        return view('livewire.aics.dashboard.aics-piechart');
    }
}
