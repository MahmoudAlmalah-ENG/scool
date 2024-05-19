<?php

namespace App\Livewire;

use App\Trait\Files\FileWithoutModel;
use Livewire\Component;
use App\Livewire\Forms\ProfileForm;
use Livewire\WithFileUploads;

class UserProfileForm extends Component
{
    use FileWithoutModel,WithFileUploads;

    public ProfileForm $form;

    protected $listeners = [
        'editProfile' => 'edit',
    ];

    public function edit(): void
    {
        $user = auth()->user();
        $this->form->name = $user->name;
        $this->form->phone = $user->phone;
        $this->form->email = $user->email;
        $this->form->address = $user->address;
        $this->form->avatar = $user->avatar;
        $this->form->school = $user->school;
        $this->form->birthday = $user->birthday;
        $this->form->gender = $user->gender;

        $this->dispatch('showUserModel');
    }

    public function update()
    {
        $this->form->validate();

        $user = auth()->user();
        $file = $this->uploadFile(file: $this->form->avatar, path: 'avatars', id: $user->id, oldFile: $user->avatar);
        $user->update(array_merge($this->form->toArray(), ['avatar' => $file]));

        return to_route('profile.index')->with(key: 'success', value: 'Profile updated successfully!');
    }

    public function render()
    {
        return view('livewire.profile-form');
    }
}
