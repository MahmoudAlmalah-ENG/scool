<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ProfileForm extends Form
{
    #[Validate(['required'])]
    public $name = '';

    #[Validate(['required'])]
    public $phone = '';

    #[Validate(['required', 'email', 'max:254'])]
    public $email = '';

    #[Validate(['nullable'])]
    public $address = '';

    #[Validate(['nullable', 'image', 'max:1024'])]
    public $avatar = '';

    #[Validate(['nullable'])]
    public $school = '';

    #[Validate(['nullable', 'date'])]
    public $birthday = '';

    #[Validate(['required'])]
    public $gender = '';
}
