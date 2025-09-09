@extends('backend.master')

@section('title', 'All Users')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-11">
            <div class="card border-0 shadow-sm rounded-3">

                {{-- Card Header --}}
                <div class="card-header bg-white border-bottom-0 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 text-primary fw-bold">
                        <i class="bi bi-people me-2"></i> All Users
                    </h5>
                    <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">
                        <i class="bi bi-plus-circle me-1"></i> Add New User
                    </a>
                </div>

                {{-- Success Message --}}
                @if(session('success'))
                    <div class="alert alert-success m-3">{{ session('success') }}</div>
                @endif

                {{-- Table --}}
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="usersTable" class="table table-bordered table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Created At</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning me-1">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">No users found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- DataTables CSS & JS -->
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#usersTable').DataTable({
            responsive: true,
            pageLength: 5,
            order: [[0, 'asc']],
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search users..."
            }
        });
    });
</script>
@endpush
