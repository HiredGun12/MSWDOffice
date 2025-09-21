<?php

namespace App\Livewire\Logs\Soloparent;

use Livewire\Component;
use App\Models\SoloParent;

class SoloparentDeleted extends Component
{
    public $deletedParents;

    public function mount()
    {
        // Fetch only soft-deleted records
        $this->deletedParents = SoloParent::onlyTrashed()->get();
    }

    public function restore($id)
    {
        $parent = SoloParent::withTrashed()->find($id);
        if ($parent) {
            $parent->restore();
            session()->flash('success', 'Solo Parent record restored successfully.');

            // Refresh the deleted records list
            $this->deletedParents = SoloParent::onlyTrashed()->get();
        }
    }

    public function render()
    {
        return view('livewire.logs.soloparent.soloparent-deleted', [
            'deletedParents' => $this->deletedParents
        ]);
    }
}
