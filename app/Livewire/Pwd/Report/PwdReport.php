<?php

namespace App\Livewire\Pwd\Report;

use Livewire\Component;
use App\Models\Pwd; // make sure you import your model
use Livewire\WithPagination;

class PwdReport extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $pwds = Pwd::query()
            ->when($this->search, function ($query) {
                $query->where('first_name', 'like', '%' . $this->search . '%')
                    ->orWhere('last_name', 'like', '%' . $this->search . '%')
                    ->orWhere('barangay', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);

        $genderCounts = Pwd::selectRaw('sex, COUNT(*) as total')
            ->groupBy('sex')
            ->pluck('total', 'sex');

        $barangayCounts = Pwd::selectRaw('barangay, COUNT(*) as total')
            ->groupBy('barangay')
            ->pluck('total', 'barangay');

        // ✅ Newly registered today vs. old registered before today
        $newlyRegistered = Pwd::whereDate('created_at', today())->count();
        $oldRegistered   = Pwd::whereDate('created_at', '<', today())->count();

        return view('livewire.pwd.report.pwd-report', [
            'pwds'            => $pwds,
            'genderCounts'    => $genderCounts,
            'barangayCounts'  => $barangayCounts,
            'newlyRegistered' => $newlyRegistered,
            'oldRegistered'   => $oldRegistered,
        ]);
    }
}
