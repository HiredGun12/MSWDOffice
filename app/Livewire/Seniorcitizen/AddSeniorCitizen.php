<?php

namespace App\Livewire\Seniorcitizen;

use Livewire\Component;
use App\Models\SeniorCitizen;
use Carbon\Carbon;

class AddSeniorCitizen extends Component
{
    public $full_name, $age, $gender, $birthday, $contact_person, $address;

    protected $rules = [
        'full_name'      => 'required|string|max:255',
        'gender'         => 'required|string|max:255',
        'age'            => 'required|integer|min:1|max:120',
        'birthday'       => 'required|date',
        'contact_person' => 'required|string|max:255',
        'address'        => 'required|string|max:500',
    ];

    // Livewire method in case the birthday changes on backend (optional)
    public function updatedBirthday($value)
    {
        if ($value) {
            $this->age = Carbon::parse($value)->age;
        } else {
            $this->age = null;
        }
    }

    public function submit()
    {
        $this->validate();

        SeniorCitizen::create([
            'full_name'      => $this->full_name,
            'gender'         => $this->gender,
            'age'            => $this->age,
            'birthday'       => $this->birthday,
            'contact_person' => $this->contact_person,
            'address'        => $this->address,
        ]);

        $this->reset(['full_name', 'age', 'birthday', 'gender', 'contact_person', 'address']);

        session()->flash('success', 'Senior Citizen added successfully!');

        return redirect()->route('senior-citizen.list');
    }

    public function render()
    {
        return view('livewire.seniorcitizen.add-senior-citizen');
    }
}
