<?php

namespace App\Livewire\Aics\Members;

use App\Models\AICs;
use Livewire\Component;

class AddMembers extends Component
{
    public $first_name, $middle_name, $last_name, $suffix;
    public $barangay, $department_function_code, $amount, $purpose;
    public $assistance_date;

    public function mount()
    {
        // Default assistance_date to today
        $this->assistance_date = now()->toDateString();
    }

    public function render()
    {
        return view('livewire.aics.members.add-members');
    }

    public function submit()
    {
        $this->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'suffix' => 'nullable|string|max:50',
            'barangay' => 'nullable|string|max:255',
            'department_function_code' => 'required|integer|unique:aics,department_function_code',
            'amount' => 'nullable|numeric',
            'purpose' => 'required|string|max:255',

            // Restrict assistance_date so it cannot go BEYOND this year
            'assistance_date' => [
                'required',
                'date',
                'before_or_equal:' . now()->endOfYear()->toDateString(), // Max = Dec 31 this year
            ],
        ]);

        AICs::create([
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'suffix' => $this->suffix,
            'barangay' => $this->barangay,
            'department_function_code' => $this->department_function_code,
            'amount' => $this->amount,
            'purpose' => $this->purpose,
            'assistance_date' => $this->assistance_date,
        ]);

        session()->flash('success', 'AICS record created successfully.');

        // Reset form but keep today's date
        $this->reset([
            'first_name',
            'middle_name',
            'last_name',
            'suffix',
            'barangay',
            'department_function_code',
            'amount',
            'purpose'
        ]);
        $this->assistance_date = now()->toDateString();

        return redirect()->route('aics.list');
    }
}
