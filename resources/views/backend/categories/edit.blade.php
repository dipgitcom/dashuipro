@extends('backend.master')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Card -->
            <div class="card shadow-sm border-0">
            <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Category</h5>
                    <a href="{{ route('categories.index') }}" class="btn btn-light btn-sm">Back to List</a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
                        @csrf 
                        @method('PUT')

                        <div class="row g-3">
                            {{-- Category Name --}}
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Category Name <span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control form-control-lg" value="{{ $category->name }}" required>
                                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            {{-- Slug --}}
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Slug <span class="text-danger">*</span></label>
                                <input type="text" name="slug" class="form-control form-control-lg" value="{{ $category->slug }}" required>
                                @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                        </div>

                        {{-- Image --}}
                        <div class="mb-3 mt-3">
                            <label class="form-label fw-bold">Category Image</label>
                            @if ($category->image)
                                <div class="mb-2">
                                    <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" class="img-thumbnail" style="max-width:150px;">
                                </div>
                            @endif
                            <input type="file" name="image" class="form-control form-control-sm">
                            @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Status --}}
                        <div class="mb-3 form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="status" value="1" id="statusSwitch"
                                   {{ $category->status ? 'checked' : '' }}>
                            <label class="form-check-label fw-bold" for="statusSwitch">Active</label>
                        </div>

                        {{-- Description --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">Description</label>
                            <textarea name="description" class="form-control" rows="4" placeholder="Enter category description">{{ $category->description }}</textarea>
                        </div>

                        {{-- Buttons --}}
                        <div class="d-flex justify-content-end gap-2 mt-3">
                            <button type="submit" class="btn btn-success">Update Category</button>
                            <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
