@extends('profile.index')

@section('user-content')
    <div class="card mb-4">
        <h5 class="card-header">
            Your Projects

            <button class="btn btn-outline-primary float-end"
                    onclick="Livewire.dispatch('showCreateProjectModel')">
                Add New Project
            </button>
        </h5>
        <div class="card-body">
            <div class="row mb-5">
                @forelse($projects as $project)
                    <div class="col-md-6 col-lg-4 mb-3">
                        <div class="card h-100">
                            <img class="card-img-top"
                                 src="{{ $project->getFirstMediaUrl('project_images') }}"
                                 alt="{{ $project->name }}"
                            />
                            <div class="card-body">
                                <h5 class="card-title">
                                    {{ $project->name }}
                                </h5>
                                <p class="card-text">
                                    {{ $project->description }}
                                </p>
                                <div class="d-flex justify-content-between">
                                    <button class="btn btn-outline-primary"
                                            onclick="Livewire.dispatch('showProjectInfo', [id = {{ $project->id }}])">
                                        Show
                                    </button>
                                    <button class="btn btn-outline-success"
                                            onclick="Livewire.dispatch('editProjectInfo', [id = {{ $project->id }}])">
                                        Edit
                                    </button>
                                    <button class="btn btn-outline-danger"
                                            onclick="Livewire.dispatch('deleteProjectInfo', [id = {{ $project->id }}])">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-warning text-center">
                            No project found.
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <div class="modal fade" id="showProject" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-show-project">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="mb-2">
                            Project Details
                        </h3>
                        <p class="text-muted">
                            Project details
                        </p>
                    </div>
                    <livewire:user-project-table/>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editProject" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-edit-project">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="mb-2">
                            Project Update
                        </h3>
                        <p class="text-muted">
                            Project Update
                        </p>
                    </div>
                    <livewire:user-edit-project-table/>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="createProject" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-simple modal-create-project">
            <div class="modal-content p-3 p-md-5">
                <div class="modal-body">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="text-center mb-4">
                        <h3 class="mb-2">
                            Add New Project
                        </h3>
                        <p class="text-muted">
                            Add New Project
                        </p>
                    </div>
                    <livewire:user-create-project-table/>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        window.addEventListener('hideProjectInfoModel', event => {
            $("#showProject").modal('hide');
        });

        window.addEventListener('showProjectInfoModel', event => {
            $("#showProject").modal('show');
        });

        window.addEventListener('hideProjectEditModel', event => {
            $("#editProject").modal('hide');
        });

        window.addEventListener('showProjectEditModel', event => {
            $("#editProject").modal('show');
        });

        window.addEventListener('hideCreateProjectModel', event => {
            $("#createProject").modal('hide');
        });

        window.addEventListener('showCreateProjectModel', event => {
            $("#createProject").modal('show');
        });
    </script>
@endpush
