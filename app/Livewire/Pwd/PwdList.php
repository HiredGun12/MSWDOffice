<?php

namespace App\Livewire\Pwd;

use App\Models\Pwd;
use Livewire\Component;
use Livewire\WithPagination;

class PwdList extends Component
{
    use WithPagination;

    public $search = '';
    public $sortByDisability = ''; // Filter by disability

    public $selectedPwdId;

    // Reset pagination when search changes
    public function updatingSearch()
    {
        $this->resetPage();
    }

    // Reset pagination when disability filter changes
    public function updatingSortByDisability()
    {
        $this->resetPage();
    }

    public function setDistributionTarget($id)
    {
        $this->selectedPwdId = $id;
        $this->reset(['amount', 'date', 'purpose']);
    }

    public function render()
    {
        $pwds = Pwd::query()
            ->when($this->sortByDisability, function ($query) {
                $query->where('type_of_disability', $this->sortByDisability);
            })
            ->where(function ($query) {
                $query->where('first_name', 'like', '%' . $this->search . '%')
                    ->orWhere('middle_name', 'like', '%' . $this->search . '%')
                    ->orWhere('last_name', 'like', '%' . $this->search . '%')
                    ->orWhere('sex', 'like', '%' . $this->search . '%')
                    ->orWhere('barangay', 'like', '%' . $this->search . '%')
                    ->orWhere('type_of_disability', 'like', '%' . $this->search . '%');
            })
            ->orderBy('last_name')
            ->paginate(10);

        return view('livewire.pwd.pwd-list', compact('pwds'));
    }
}
