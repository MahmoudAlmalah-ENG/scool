@extends('profile.index')

@section('user-content')
    <!-- Change Password -->
    <div class="card mb-4">
        <h5 class="card-header">Change Password</h5>
        <div class="card-body">
            <livewire:user-password-form/>
        </div>
    </div>
    <!--/ Change Password -->
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/app-user-view-security.js')}}"></script>
@endpush
