<?php

namespace App\Livewire\Soloparent;

use Livewire\Component;
use App\Models\SoloParent as SoloParentModel;

class SoloParent extends Component
{
    public $search = '';
    public $showDeleteModal = false; // controls modal visibility
    public $deleteId = null;         // stores the ID to delete

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->showDeleteModal = true;
    }

    public function delete()
    {
        $soloParent = SoloParentModel::find($this->deleteId);

        if ($soloParent) {
            $soloParent->delete();
            session()->flash('success', 'Solo Parent member deleted successfully!');
        }

        $this->showDeleteModal = false;
        $this->deleteId = null;
    }

    public function render()
    {
        $soloParents = SoloParentModel::when($this->search, function ($query) {
            $query->where('full_name', 'like', '%' . $this->search . '%')
                ->orWhere('case_number', 'like', '%' . $this->search . '%')
                ->orWhere('address', 'like', '%' . $this->search . '%');
        })
            ->get();

        return view('livewire.soloparent.solo-parent', compact('soloParents'));
    }
}
