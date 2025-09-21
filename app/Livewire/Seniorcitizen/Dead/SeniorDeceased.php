<?php

namespace App\Livewire\Seniorcitizen\Dead;

use Livewire\Component;
use App\Models\ArchivedSeniorCitizen;
use App\Models\SeniorCitizen;

class SeniorDeceased extends Component
{
    public $search = '';

    // Retrieve data from archive and move back to active senior_citizen table
    public function retrieve($id)
    {
        $archived = ArchivedSeniorCitizen::find($id);

        if ($archived) {
            // Create record in senior_citizen table
            SeniorCitizen::create([
                'full_name'      => $archived->name,
                'address'        => $archived->address,
                'age'            => $archived->age,
                'contact_person' => $archived->contact_person, // FIXED typo
                'birthday'       => $archived->birth_date,
                'gender'         => $archived->sex,
            ]);

            // Delete from archive
            $archived->delete();

            // Flash success message
            session()->flash('success', 'Senior Citizen successfully retrieved.');
        }
    }

    public function render()
    {
        $seniors = ArchivedSeniorCitizen::query()
            ->when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('address', 'like', '%' . $this->search . '%');
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('livewire.seniorcitizen.dead.senior-deceased', compact('seniors'));
    }
}
