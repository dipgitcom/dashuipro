@extends('backend.master')

@section('title', 'Categories List')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card shadow border-0 rounded-3">
                <!-- Card Header -->
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold text-white">
                        <i class="bi bi-list-ul me-2"></i> Categories List
                    </h5>
                    <a href="{{ route('categories.create') }}" class="btn btn-light btn-sm">
                        <i class="bi bi-plus-circle me-1"></i> Add Category
                    </a>
                </div>

                <!-- Card Body -->
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <table id="categoriesTable" class="table table-hover align-middle mb-0">
                            <thead class="table-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $key => $category)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>
                                            @if ($category->image)
                                                <img src="{{ asset($category->image) }}" alt="{{ $category->name }}"
                                                     style="width: 60px; height: auto; border-radius:5px; border:1px solid #ddd; padding:2px;">
                                            @else
                                                <span class="text-muted fst-italic">No Image</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input status-switch" type="checkbox"
                                                       data-id="{{ $category->id }}" {{ $category->status ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-primary mb-1">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger mb-1" onclick="return confirm('Are you sure you want to delete this category?')">
                                                    <i class="bi bi-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
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
<script>
    $(document).ready(function() {
        $('#categoriesTable').DataTable({
            responsive: true,
            lengthChange: true,
            pageLength: 10,
        });

        // Optional: toggle status AJAX (requires backend route)
        $('.status-switch').change(function() {
            let categoryId = $(this).data('id');
            let status = $(this).is(':checked') ? 1 : 0;

            $.ajax({
                url: '/categories/' + categoryId + '/toggle-status',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: status
                },
                success: function(response) {
                    console.log('Status updated');
                },
                error: function() {
                    alert('Error updating status');
                }
            });
        });
    });
</script>
@endpush
