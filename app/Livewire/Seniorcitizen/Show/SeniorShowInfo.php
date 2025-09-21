<?php

namespace App\Livewire\Seniorcitizen\Show;

use Livewire\Component;
use App\Models\SeniorCitizen;
class SeniorShowInfo extends Component
{

    public $seniors;

    public function mount($id)
    {
        $this->seniors = SeniorCitizen::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.seniorcitizen.show.senior-show-info');
    }
}
