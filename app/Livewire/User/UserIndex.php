<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\User;

class UserIndex extends Component
{

    public $confirminUserDeletion = false;
    public $selectedId = null;

    public function render()
    {

        $users = User::get();

        return view('livewire.user.user-index',compact('users'));

        
    }

    public function confirmDelete($id)
    {
        $this->confirminUserDeletion = true;
        $this->selectedId = $id;

    }


    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        session()->flash('success', 'User deleted successfully.');

        return redirect()->route('users.index');
    }
}
