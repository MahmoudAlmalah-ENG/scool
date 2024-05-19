@extends('layout.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <h4 class="py-3 mb-4">
            <span class="text-muted fw-light">
                <i class="fas fa-user me-1"></i> Profile
            </span>
        </h4>
        <div class="row">
            <!-- User Sidebar -->
            @include('profile.user-sidebar')
            <!--/ User Sidebar -->

            <!-- User Content -->
            <div class="col-xl-8 col-lg-7 col-md-7 order-0 order-md-1">
                <!-- User Pills -->
                <ul class="nav nav-pills flex-column flex-md-row mb-4">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('profile.index') ? 'active' : '' }}"
                           href="{{ route('profile.index') }}" wire:navigate>
                            <i class="ti ti-user-check ti-xs me-1"></i>
                            Account
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('profile.security') ? 'active' : '' }}"
                           href="{{ route('profile.security') }}" wire:navigate>
                            <i class="ti ti-lock ti-xs me-1"></i>
                            Security
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('profile.project') ? 'active' : '' }}"
                           href="{{ route('profile.project') }}" wire:navigate>
                            <i class="ti ti-folder ti-xs me-1"></i>
                            Projects
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('profile.team') ? 'active' : '' }}"
                            href="{{ route('profile.team') }}" wire:navigate>
                            <i class="ti ti-link ti-xs me-1"></i>
                            Project In Your Team
                        </a>
                    </li>
                </ul>
                <!--/ User Pills -->

                @yield('user-content')
            </div>
            <!--/ User Content -->
        </div>

        <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                            <h3 class="mb-2">Edit User Information</h3>
                            <p class="text-muted">Updating user details will receive a privacy audit.</p>
                        </div>
                        <livewire:user-profile-form/>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        window.addEventListener('hideUserModel', event => {
            $("#editUser").modal('hide');
        });

        window.addEventListener('showUserModel', event => {
            $("#editUser").modal('show');
        });
    </script>
@endpush
