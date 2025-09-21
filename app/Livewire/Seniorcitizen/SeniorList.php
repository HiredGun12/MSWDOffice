<?php

namespace App\Livewire\Seniorcitizen;

use Livewire\Component;
use App\Models\SeniorCitizen;
use App\Models\ArchivedSeniorCitizen;
use Illuminate\Support\Collection;

class SeniorList extends Component
{
    public $search = '';
    public $showDeleteModal = false;
    public $deleteId = null;

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->showDeleteModal = true;
    }

    public function delete()
    {
        $senior = SeniorCitizen::find($this->deleteId);

        if ($senior) {
            // Copy mapped data to archive table
            ArchivedSeniorCitizen::create([
                'name'           => $senior->full_name,
                'address'        => $senior->address,
                'age'            => $senior->age, // ✅ will use accessor
                'birth_date'     => $senior->birthday,
                'contact_person' => $senior->contact_person,
                'sex'            => $senior->gender,
            ]);

            //! Delete original record
            $senior->delete();

            $this->showDeleteModal = false;
            session()->flash('success', 'Senior Citizen moved to archive successfully!');
        }
    }

    public function render()
    {
        //! Get seniors filtered by search
        $seniors = SeniorCitizen::query()
            ->when($this->search, function ($query) {
                $query->where('full_name', 'like', '%' . $this->search . '%')
                    ->orWhere('address', 'like', '%' . $this->search . '%');
            })
            ->get();

        //! Sort by calculated age (in PHP)
        $seniors = $seniors->sortByDesc(function ($senior) {
            return $senior->age; 
        });

        return view('livewire.seniorcitizen.senior-list', compact('seniors'));
    }
}
