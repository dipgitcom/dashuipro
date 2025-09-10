@extends('backend.master')

@section('title', 'All Users')

@section('content')
<div class="container-fluid py-4">
    <div class="row">
        <!-- Left Panel: Users List -->
        <div class="col-lg-5">
            <div class="card shadow-sm rounded-3">
                <div class="card-header bg-white border-bottom-0 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 text-primary fw-bold"><i class="bi bi-people me-2"></i> Users</h5>
                    <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">
                        <i class="bi bi-plus-circle me-1"></i> Add User
                    </a>
                </div>
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $u)
                                <tr @if(isset($selectedUser) && $selectedUser->id == $u->id) class="table-primary" @endif>
                                    <td>
                                        <a href="{{ route('users.index', ['selected' => $u->id]) }}">
                                            {{ $u->name }}
                                        </a>
                                    </td>
                                    <td>{{ $u->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Right Panel: User Details -->
        <div class="col-lg-7">
            <div class="card shadow-sm rounded-3">
                <div class="card-header bg-white border-bottom-0">
                    <h5 class="mb-0 text-primary fw-bold">User Details</h5>
                </div>
                <div class="card-body">
                    @if(isset($selectedUser))
                        <form action="{{ route('users.update', $selectedUser->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $selectedUser->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $selectedUser->email }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Roles (comma-separated)</label>
                                <input type="text" name="roles" class="form-control" value="{{ $selectedUser->roles->pluck('name')->join(', ') }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password (leave blank to keep current)</label>
                                <input type="password" name="password" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-success me-2">Save Changes</button>
                        </form>

                        <form action="{{ route('users.destroy', $selectedUser->id) }}" method="POST" class="mt-3">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                Delete User
                            </button>
                        </form>
                    @else
                        <p class="text-muted">Select a user from the list to view and edit details.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
