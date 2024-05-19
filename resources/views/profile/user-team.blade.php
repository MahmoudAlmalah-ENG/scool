@extends('profile.index')

@section('user-content')
    <div class="card mb-4">
        <h5 class="card-header">
            Your Team Projects
        </h5>
        <div class="card-body">
            <div class="row mb-5">
                @forelse($teams as $project)
                    @foreach($project->users as $users)
                        @if($users->id === auth()->id())
                            @foreach($users->projects as $project)
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
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
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
@endsection

@push('scripts')
    <script>
        window.addEventListener('hideProjectInfo', event => {
            $("#showProject").modal('hide');
        });

        window.addEventListener('showProjectInfo', event => {
            $("#showProject").modal('show');
        });
    </script>
@endpush
