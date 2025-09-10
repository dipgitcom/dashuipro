@extends('backend.master')

@section('content')
<div class="row justify-content-center mt-3">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold text-white">Create Category</h5>
                <a href="{{ route('categories.index') }}" class="btn btn-light btn-sm">Back to List</a>
            </div>

            <div class="card-body">
                <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Name --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Category Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control form-control-lg" placeholder="Enter category name" required>
                    </div>

                    {{-- Slug --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Slug</label>
                        <input type="text" name="slug" class="form-control form-control-lg" placeholder="Auto-generated or type manually">
                    </div>

                    {{-- Image --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Category Image</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    {{-- Description --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Description</label>
                        <textarea name="description" rows="4" class="form-control" placeholder="Write a short description"></textarea>
                    </div>

                    {{-- Status --}}
                    <div class="mb-3 form-check form-switch">
                        <input type="checkbox" name="status" class="form-check-input" id="statusSwitch" checked>
                        <label class="form-check-label fw-bold" for="statusSwitch">Active</label>
                    </div>

                    {{-- Buttons --}}
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
