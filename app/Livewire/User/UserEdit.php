<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserEdit extends Component
{

    public $user, $name, $email, $password, $confirm_password,$allRoles;
    public $roles = []; 

    public function mount($id)
    {
        $this->user = User::findOrFail($id);
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->allRoles = Role::all(); 
        $this->roles = $this->user->roles()->pluck('name'); // Get roles as an array
        
    }
    public function render()
    {
        return view('livewire.user.user-edit');
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->user->id, // Ignore unique for current user
            'password' => 'nullable|min:6|same:confirm_password', // Make password optional
        ]);

        $this->user->name = $this->name;
        $this->user->email = $this->email;

        if (!empty($this->password)) {
            $this->user->password = Hash::make($this->password);
        }

        $this->user->save();


        $this->user->syncRoles($this->roles);
        session()->flash('success', 'User updated successfully.');

        return redirect()->route('users.index');
    }
}
