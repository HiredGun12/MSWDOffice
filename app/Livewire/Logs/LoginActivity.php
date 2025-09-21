<?php

namespace App\Livewire\Logs;

use Livewire\Component;
use App\Models\User;

class LoginActivity extends Component
{
    public function render()
    {
        // Get all users (you can add pagination or ordering here)
        $users = User::orderBy('name')->get();

        // Pass $users to the Blade view
        return view('livewire.logs.login-activity', [
            'users' => $users,
        ]);
    }
}
