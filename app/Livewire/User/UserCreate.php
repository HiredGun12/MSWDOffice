<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
class UserCreate extends Component
{

    public $name,$email,$password,$confirm_password,$allRoles;
    public $roles = [];

    public function mount()
    {

        $this->allRoles = Role::all();
    }
    public function render()
    {
        return view('livewire.user.user-create');
    }
    public function submit()
    {
        $this->validate([

            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm_password|min:6',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $user->syncRoles($this->roles);

        return to_route('users.index')->with('success', 'User created successfully.');
    }
}
