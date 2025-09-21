<?php

namespace App\Livewire\Soloparent\Dashboard;

use Livewire\Component;
use App\Models\SoloParent;

class SoloparentLinechart extends Component
{
    public $chartData = [];

    public function mount()
    {
        $this->generateChartData();
    }

    public function generateChartData()
    {
        // Group Solo Parents by barangay
        $data = SoloParent::select('address as barangay')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('barangay')
            ->pluck('total', 'barangay');

        $this->chartData = [
            'labels' => $data->keys(),
            'counts' => $data->values(),
        ];
    }
    public function render()
    {
        return view('livewire.soloparent.dashboard.soloparent-linechart');
    }
}
