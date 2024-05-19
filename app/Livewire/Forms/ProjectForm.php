<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class ProjectForm extends Form
{
    #[Validate(['required'])]
    public $name = '';

    #[Validate(['required'])]
    public $description = '';

    public $old_images;

    #[Validate(['nullable', 'array', 'min:1'])]
    public $images;

    public $old_video;

    public $video;
}
