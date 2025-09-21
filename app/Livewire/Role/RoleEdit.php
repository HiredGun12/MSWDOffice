<?php

namespace App\Livewire\Role;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleEdit extends Component
{

    public $name,$role;
    public $permissions = [];
    public $allPermissions = [];

    public function mount($id)
    {
        $this->role = Role::findOrFail($id);
        $this->allPermissions =Permission::all();
        $this->name=$this -> role->name;
        $this->permissions = $this->role->permissions->pluck('name');
    }
    public function render()
    {
        return view('livewire.role.role-edit');
    }
    public function submit()
    {
        $this->validate([
            'name' => 'required|unique:roles,name,'.$this->role->id,
            'permissions' => 'required',
        ]);

        $this->role->name = $this->name;

        $this->role->save();

        $this->role->syncPermissions($this->permissions);

        session()->flash('success', 'Role updated successfully.');
        return redirect()->route('roles.index');
    }
}
