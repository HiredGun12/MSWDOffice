<?php

namespace App\Livewire\Soloparent\Show;

use Livewire\Component;
use App\Models\SoloParent;

class ShowParents extends Component
{

    public $soloParents;//* variable


    //! Solo Parents Showing
    public function mount($id)
    {
        $this->soloParents = SoloParent::with(['familyMembers', 'emergencyContacts'])
            ->findOrFail($id);
    }
    public function render()
    {
        return view('livewire.soloparent.show.show-parents', [
            'soloParent' => $this->soloParents
        ]);
    }
}
