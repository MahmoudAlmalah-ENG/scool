<?php

namespace App\Livewire;

use App\Livewire\Forms\ProjectForm;
use App\Models\Project;
use App\Trait\Files\FileWithoutModel;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserEditProjectTable extends Component
{
    use FileWithoutModel, WithFileUploads;

    public ProjectForm $form;
    public $modelId;

    protected $listeners = [
        'editProjectInfo' => 'edit',
    ];

    public function edit(int $id): void
    {
        $project = Project::find($id);
        $this->modelId = $project->id;
        $this->form->name = $project->name;
        $this->form->description = $project->description;
        $this->form->old_images = $project->getMedia(collectionName: 'project_images');
        if ($project->video) {
            $this->form->old_video = $project->getVideoUrl();
        } else {
            $this->form->old_video = null;
        }

        $this->dispatch(event: 'showProjectEditModel');
    }

    public function update()
    {
        try {
            $this->form->validate();

            $project = Project::find($this->modelId);
            $project->update(attributes: $this->form->except(properties: ['old_images', 'old_video', 'images', 'video']));

            if ($this->form->images) {
                $file = $this->form->images;
                foreach ($file as $image) {
                    $project->addMedia(file: $image)->toMediaCollection(collectionName: 'project_images');
                }
            }

            if ($this->form->video) {
                $video = $this->form->video;
                $file = $this->uploadFile(file: $video, path: 'videos/', id: $project->id);
                $project->update(['video' => $file]);
            }

            return to_route(route: 'profile.project')->with(key: 'success', value: 'Project updated successfully');
        } catch (\Exception $e) {
            return back()->with(key: 'error', value: 'Something went wrong');
        }
    }

    public function deleteImage(int $id): void
    {
        $project = Project::find($this->modelId);
        $project->deleteMedia(mediaId: $id);

        $this->form->old_images = $project->getMedia(collectionName: 'project_images')->fresh();
    }

    public function deleteVideo(): void
    {
        $project = Project::find($this->modelId);
        $this->removeFile(path: 'videos/', file: $project->video, id: $project->id);
        $project->update(['video' => null]);

        $this->form->old_video = null;
    }

    public function render()
    {
        return view(view: 'livewire.user-edit-project-table');
    }
}
