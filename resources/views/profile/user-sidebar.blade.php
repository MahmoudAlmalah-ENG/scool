@use('App\Enum\UserEnum')
@php($user = auth()->user())
<div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
    <!-- User Card -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="user-avatar-section">
                <div class=" d-flex align-items-center flex-column">
                    <img class="img-fluid rounded mb-3 pt-1 mt-4"
                         src="{{ $user->Avatar() }}"
                         height="100"
                         width="100"
                         alt="{{ $user->name }}"
                    />
                    <div class="user-info text-center">
                        <h4 class="mb-2">
                            {{ $user->name }}
                        </h4>
                        <span class="badge bg-label-secondary mt-1">
                                        {{ UserEnum::getRoleName($user->role) }}
                                    </span>
                    </div>
                </div>
            </div>
            <p class="mt-4 small text-uppercase text-muted">Details</p>
            <div class="info-container">
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <span class="fw-medium me-1">Username:</span>
                        <span>
                                        {{ $user->name ?? 'N/A' }}
                                    </span>
                    </li>
                    <li class="mb-2 pt-1">
                        <span class="fw-medium me-1">Email:</span>
                        <span>
                                        {{ $user->email ?? 'N/A' }}
                                    </span>
                    </li>
                    <li class="mb-2 pt-1">
                        <span class="fw-medium me-1">Role:</span>
                        <span>
                                        {{ UserEnum::getRoleName($user->role) ?? 'N/A' }}
                                    </span>
                    </li>
                    <li class="mb-2 pt-1">
                        <span class="fw-medium me-1">Adders:</span>
                        <span>
                                        {{ $user->address ?? 'N/A' }}
                                    </span>
                    </li>
                    <li class="mb-2 pt-1">
                        <span class="fw-medium me-1">Phone:</span>
                        <span>
                                        {{ $user->phone ?? 'N/A' }}
                                    </span>
                    </li>
                    <li class="mb-2 pt-1">
                        <span class="fw-medium me-1">School:</span>
                        <span>
                                        {{ $user->school ?? 'N/A' }}
                                    </span>
                    </li>
                    <li class="pt-1">
                        <span class="fw-medium me-1">Birthday:</span>
                        <span>
                                        {{ $user->birthday ?? 'N/A' }}
                                    </span>
                    </li>
                    <li class="pt-1">
                        <span class="fw-medium me-1">Gender:</span>
                        <span>
                                        {{ UserEnum::getGenderName($user->gender) }}
                                    </span>
                    </li>
                </ul>
                <div class="d-flex justify-content-center">
                    <a href="javascript:" class="btn btn-primary me-3"
                       onclick="Livewire.dispatch('editProfile')">
                        Edit
                    </a>
                    <a href="{{ route('auth.logout') }}" class="btn btn-label-danger suspend-user">
                        Logout
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- /User Card -->
</div>
