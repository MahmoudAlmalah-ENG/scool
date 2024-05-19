<?php

namespace App\Livewire;

use Livewire\Component;

class UserPasswordForm extends Component
{
    public $password, $password_confirmation;

    public function update()
    {
        $this->validate([
            'password' => 'required|confirmed|min:8',
        ]);

        auth()->user()->update([
            'password' => $this->password,
        ]);

        return to_route('profile.security')->with('success', 'Password updated successfully.');
    }

    public function render()
    {
        return view('livewire.user-password-form');
    }
}
