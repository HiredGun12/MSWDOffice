<?php

namespace App\Livewire\Aics\Dashboard;

use Livewire\Component;
use App\Models\AICs;
use Illuminate\Support\Facades\DB;

class AicsLinechart extends Component
{
    public $chartData = [];

    public function mount()
    {
        // Get total amount per barangay grouped by month
        $data = AICs::select(
            DB::raw('barangay'),
            DB::raw("TO_CHAR(assistance_date, 'YYYY-MM') as month"),
            DB::raw('SUM(amount) as total_amount')
        )
            ->groupBy('barangay', 'month')
            ->orderBy('month')
            ->get();

        // Extract unique barangays and months
        $barangays = $data->pluck('barangay')->unique();
        $months = $data->pluck('month')->unique();

        $datasets = [];

        foreach ($barangays as $barangay) {
            $barangayData = [];

            foreach ($months as $month) {
                // Correct way to get record matching barangay and month
                $record = $data->first(function ($item) use ($barangay, $month) {
                    return $item->barangay === $barangay && $item->month === $month;
                });

                $barangayData[] = $record ? $record->total_amount : 0;
            }

            $datasets[] = [
                'label' => $barangay,
                'data' => $barangayData,
                'borderColor' => '#' . substr(md5($barangay), 0, 6),
                'fill' => false,
                'tension' => 0.3,
            ];
        }

        // Prepare Chart.js data
        $this->chartData = [
            'labels' => $months->values(),
            'datasets' => $datasets,
        ];
    }

    public function render()
    {
        return view('livewire.aics.dashboard.aics-linechart');
    }
}
