<?php

namespace App\Exports;

use App\Models\AICs;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AicsMembersExport implements FromCollection, WithHeadings
{
    protected $day;

    public function __construct($day)
    {
        $this->day = $day; // Example: '2025-08-24'
    }

    public function collection()
    {
        return AICs::whereRaw("to_char(assistance_date, 'YYYY-MM-DD') = ?", [$this->day])
            ->get(['first_name', 'middle_name', 'last_name', 'barangay', 'purpose', 'assistance_date']);
    }

    public function headings(): array
    {
        return ['First Name', 'Middle Name', 'Last Name', 'Barangay', 'Purpose', 'Assistance Date'];
    }
}
