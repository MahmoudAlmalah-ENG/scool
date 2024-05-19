<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class UserProjectTable extends Component
{
    public $name, $description, $images, $video;

    protected $listeners = [
        'showProjectInfo' => 'showView',
        'deleteProjectInfo' => 'delete',
    ];

    public function showView(int $id): void
    {
        $project = Project::find($id);
        $this->name = $project->name;
        $this->description = $project->description;
        $this->images = $project->getMedia('project_images');
        if ($project->video) {
            $this->video = $project->getVideoUrl();
        } else {
            $this->video = null;
        }
        $this->dispatch('showProjectInfoModel');
    }

    public function delete(int $id)
    {
        Project::find($id)?->delete();

        return to_route('profile.project')->with('success', 'Project deleted successfully');
    }

    public function render()
    {
        return view('livewire.user-project-table');
    }
}
