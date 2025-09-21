<?php

namespace App\Livewire\Soloparent\Edit;

use Livewire\Component;
use App\Models\SoloParent;

class EditSoloParent extends Component
{
    public $soloParent;

    // Parent fields
    public $case_number, $full_name, $address, $age, $sex, $civil_status,
        $occupation, $religion, $educational_attainment,
        $company_agency, $contact_no, $email_address,
        $birth_place, $date_of_birth;

    // Related models
    public $familyMembers = [];
    public $emergencyContacts = [];

    public function mount($id)
    {
  
        $this->soloParent = SoloParent::with(['familyMembers', 'emergencyContacts'])->findOrFail($id);

  
        $this->fill($this->soloParent->toArray());
        $this->familyMembers = $this->soloParent->familyMembers->toArray();
        $this->emergencyContacts = $this->soloParent->emergencyContacts->toArray();
    }

    public function update()
    {
        $this->validate([
            'case_number' => 'required',
            'full_name' => 'required',
            'address' => 'required',
            'age' => 'required|integer',
            'sex' => 'required',
        ]);

        // Update parent details
        $this->soloParent->update([
            'case_number' => $this->case_number,
            'full_name' => $this->full_name,
            'address' => $this->address,
            'age' => $this->age,
            'sex' => $this->sex,
            'civil_status' => $this->civil_status,
            'occupation' => $this->occupation,
            'religion' => $this->religion,
            'educational_attainment' => $this->educational_attainment,
            'company_agency' => $this->company_agency,
            'contact_no' => $this->contact_no,
            'email_address' => $this->email_address,
            'birth_place' => $this->birth_place,
            'date_of_birth' => $this->date_of_birth,


            
        ]);

        session()->flash('success', 'Solo Parent updated successfully.');
        return redirect()->route('solo-parent.list');
    }

    public function render()
    {
        return view('livewire.soloparent.edit.edit-solo-parent');
    }
}
