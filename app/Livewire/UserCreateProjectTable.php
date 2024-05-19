<?php

namespace App\Livewire;

use App\Livewire\Forms\ProjectForm;
use App\Models\Project;
use App\Trait\Files\FileWithoutModel;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserCreateProjectTable extends Component
{
    use FileWithoutModel, WithFileUploads;

    public $name, $description, $images, $video;

    public function hydrate(): void
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function store()
    {
        try {
            $this->validate([
                'name' => 'required|string',
                'description' => 'required|string',
                'images' => 'required',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'video' => 'nullable|mimes:mp4,mov,ogg,qt|max:20000',
            ]);

            $project = Project::create([
                'name' => $this->name,
                'description' => $this->description,
                'user_id' => auth()->id(),
            ]);

            $file = $this->images;
            foreach ($file as $image) {
                $project->addMedia(file: $image)->toMediaCollection(collectionName: 'project_images');
            }

            if ($this->video) {
                $video = $this->video;
                $file = $this->uploadFile(file: $video, path: 'videos/', id: $project->id);
                $project->update(['video' => $file]);
            }

            return to_route(route: 'profile.project')->with(key: 'success', value: 'Project created successfully');
        } catch (\Exception $e) {
            return back()->with(key: 'error', value: 'Something went wrong');
        }
    }

    public function render()
    {
        return view(view: 'livewire.user-create-project-table');
    }
}
