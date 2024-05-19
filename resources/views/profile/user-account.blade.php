@extends('profile.index')

@section('user-content')
    <!-- Project table -->
    <div class="card mb-4">
        <h5 class="card-header">
            Your Teams
        </h5>
        <div class="table-responsive mb-3">
            <table class="table datatable-project border-top">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Team Name</th>
                    <th>Team Description</th>
                    <th>Members</th>
                    <th>Workshops</th>
                </tr>
                </thead>
                <tbody>
                @forelse($user->teams as $team)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $team->name }}</td>
                        <td>{{ $team->description }}</td>
                        <td class="text-center">
                            {{ $team->users->count() }}
                        </td>
                        <td class="text-center">
                            {{ $team->workshops->count() }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <div class="col-12">
                            <div class="alert alert-warning text-center">
                                No Team found.
                            </div>
                        </div>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <!-- /Project table -->

    <!-- WorkShop table -->
    <div class="card mb-4">
        <h5 class="card-header">
            Your Teams
        </h5>
        <div class="table-responsive mb-3">
            <table class="table datatable-invoice border-top">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Icon</th>
                    <th>WorkShop Name</th>
                    <th>WorkShop Description</th>
                    <th>Team Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                </tr>
                </thead>
                <tbody>
                @forelse($user->teams as $team)
                    @foreach($team->workshops as $workshop)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $workshop->icon }}</td>
                            <td>{{ $workshop->title }}</td>
                            <td>{{ $workshop->description }}</td>
                            <td>{{ $team->name }}</td>
                            <td>{{ $workshop->formatted_start_at }}</td>
                            <td>{{ $workshop->formatted_end_at }}</td>
                        </tr>
                    @endforeach
                @empty
                    <tr>
                        <div class="col-12">
                            <div class="alert alert-warning text-center">
                                No WorkShop found.
                            </div>
                        </div>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <!-- /WorkShop table -->
@endsection
