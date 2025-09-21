<?php

namespace App\Livewire\Aics\Folder;

use App\Models\AICs;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class AicsList extends Component
{
    use WithPagination;

    public $deleteId = null;
    public $showDeleteModal = false;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $person = AICs::query()
            ->select('aics.*')
            ->join(
                DB::raw('(SELECT MAX(id) as id 
                          FROM aics 
                          GROUP BY first_name, middle_name, last_name, suffix, barangay) as latest'),
                'aics.id',
                '=',
                'latest.id'
            )
            ->when($this->search, function ($query) {
                $query->where(function ($subQuery) {
                    $subQuery->where('aics.first_name', 'like', '%' . $this->search . '%')
                        ->orWhere('aics.middle_name', 'like', '%' . $this->search . '%')
                        ->orWhere('aics.last_name', 'like', '%' . $this->search . '%')
                        ->orWhere('aics.barangay', 'like', '%' . $this->search . '%')
                        ->orWhere('aics.assistance_date', 'like', '%' . $this->search . '%');
                });
            })
            ->orderBy('aics.assistance_date', 'desc') // newest to oldest
            ->paginate(10);

        return view('livewire.aics.folder.aics-list', compact('person'));
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
        $this->showDeleteModal = true;
    }

    public function delete()
    {
        $person = AICs::find($this->deleteId);

        if ($person) {
            $person->delete();
            session()->flash('success', 'Person deleted successfully.');
        }

        $this->showDeleteModal = false;
        $this->deleteId = null;
    }
}
