@extends('backend.master')

@section('title', 'Add New User')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 text-primary fw-bold">
                        <i class="bi bi-plus-circle me-2"></i> Add New User
                    </h5>
                    <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary">
                        <i class="bi bi-arrow-left-circle me-1"></i> Back
                    </a>
                </div>

                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <select name="role" class="form-control" required>
                                @foreach($roles as $role)
                                    <option value="{{ $role }}">{{ $role }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i> Create User
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
