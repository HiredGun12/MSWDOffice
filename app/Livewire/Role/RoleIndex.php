<?php

namespace App\Livewire\Role;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleIndex extends Component
{
    public function render()
    {

        $roles = Role::get();

        return view('livewire.role.role-index',compact('roles'));
    }

    public function delete($id)
    {
        $role = Role::find($id);

        if ($role) {
            $role->delete();
            session()->flash('success', 'Role deleted successfully.');

            
            $this->dispatch('close-modal', id: 'delete-role-' . $id);
        }
    }
}
