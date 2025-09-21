<?php

namespace App\Livewire\Seniorcitizen\Update;

use Livewire\Component;
use App\Models\SeniorCitizen;

class UpdateSenior extends Component
{

    public $seniors, $name, $birthday, $age, $contact_person, $address,$gender;

    public function mount($id)
    {
        $this->seniors = SeniorCitizen::find($id);
        $this->name = $this->seniors->full_name;
        $this->age = $this->seniors->age;
        $this->birthday = $this->seniors->birthday;
        $this->gender = $this->seniors->gender;
        $this->contact_person = $this->seniors->contact_person;
        $this->address = $this->seniors->address;
        
       

    }


    public function render()
    {
        return view('livewire.seniorcitizen.update.update-senior');
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:1|max:120',
            'gender' => 'required|string|max:255',
            'birthday' => 'required|date',
            'contact_person' => 'required|string|max:255',
            'address' => 'required|string|max:500',
        ]);

        $this->seniors->update([
            'full_name' => $this->name,
            'age' => $this->age,          
            'birthday' => $this->birthday,
            'gender' => $this->gender,
            'contact_person' => $this->contact_person,
            'address' => $this->address,
        ]);

        session()->flash('success', 'Senior Citizen updated successfully!');

        return redirect()->route('senior-citizen.list');
    }
}
