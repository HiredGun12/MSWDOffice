<?php

namespace App\Livewire\Aics\Members;

use Livewire\Component;
use App\Models\AICs;

class UpdateMember extends Component
{
    public $aicsId;
    public $first_name, $middle_name, $last_name, $suffix;
    public $barangay, $department_function_code, $amount, $purpose;
    public $assistance_date;

    // Load existing data when the component is mounted
    public function mount($id)
{
    $aics = AICs::findOrFail($id);

    $this->aicsId = $aics->id;
    $this->first_name = $aics->first_name;
    $this->middle_name = $aics->middle_name;
    $this->last_name = $aics->last_name;
    $this->suffix = $aics->suffix;
    $this->barangay = $aics->barangay;
    $this->department_function_code = $aics->department_function_code;
    $this->amount = $aics->amount;
    $this->purpose = $aics->purpose;

    // Fix for date input
    $this->assistance_date = $aics->assistance_date
        ? \Carbon\Carbon::parse($aics->assistance_date)->format('Y-m-d')
        : null;
}



    public function update()
    {
        $this->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'suffix' => 'nullable',
            'barangay' => 'required',
            'department_function_code' => 'required',
            'amount' => 'required|numeric',
            'purpose' => 'required',
            'assistance_date' => 'nullable|date',

            
        ]);

        $aics = AICs::findOrFail($this->aicsId);
        $aics->update([
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

        session()->flash('success', 'Member updated successfully.');
        return redirect()->route('aics.list');
    }

    public function render()
    {
        return view('livewire.aics.members.update-member');
    }
}
