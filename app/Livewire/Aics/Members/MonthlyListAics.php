<?php

namespace App\Livewire\Aics\Members;

use Livewire\Component;
use App\Models\AICs;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AicsMembersExport;
use Carbon\Carbon;

class MonthlyListAics extends Component
{
    public $search = '';

    public function render()
    {
        // 1. Get all records ordered by assistance_date
        $aicsRecords = AICs::orderBy('assistance_date', 'desc')->get();

        // 2. Apply search filter on folder date (assistance_date)
        if (trim($this->search) !== '') {
            $search = strtolower($this->search);

            $aicsRecords = $aicsRecords->filter(function ($item) use ($search) {
                $date = Carbon::parse($item->assistance_date);

                $rawDay    = strtolower($date->toDateString());       // 2025-08-24
                $formatted = strtolower($date->format('F d, Y'));     // August 24, 2025
                $monthYear = strtolower($date->format('F Y'));        // August 2025
                $monthOnly = strtolower($date->format('F'));          // August
                $yearOnly  = strtolower($date->format('Y'));          // 2025

                return str_contains($rawDay, $search)
                    || str_contains($formatted, $search)
                    || str_contains($monthYear, $search)
                    || str_contains($monthOnly, $search)
                    || str_contains($yearOnly, $search);
            });
        }

        // 3. Group by day (folder per day)
        $groupedByDay = $aicsRecords->groupBy(function ($item) {
            return Carbon::parse($item->assistance_date)->toDateString();
        });

        // 4. Inside each day, group by barangay
        $groupedMembers = $groupedByDay->map(function ($items) {
            return $items->groupBy('barangay');
        });

        return view('livewire.aics.members.monthly-list-aics', [
            'groupedMembers' => $groupedMembers
        ]);
    }

    public function export($day)
    {
        return Excel::download(new AicsMembersExport($day), 'aics_members_' . $day . '.xlsx');
    }
}
