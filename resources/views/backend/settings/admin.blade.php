@extends('backend.master')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    
            <h5 class="mb-0 fw-bold text-white">Admin Settings</h5>
        </div>
        <div class="card-body">
            
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('settings.admin.update') }}" enctype="multipart/form-data">
                @csrf

                <!-- App Name -->
                <div class="mb-3">
                    <label for="APP_NAME" class="form-label">App Name</label>
                    <input type="text" id="APP_NAME" name="APP_NAME" class="form-control" 
                           value="{{ old('APP_NAME', $settings['APP_NAME']) }}" placeholder="Enter application name" required>
                </div>

                <!-- App URL -->
                <div class="mb-3">
                    <label for="APP_URL" class="form-label">App URL</label>
                    <input type="url" id="APP_URL" name="APP_URL" class="form-control" 
                           value="{{ old('APP_URL', $settings['APP_URL']) }}" placeholder="https://example.com" required>
                </div>

                <!-- Debug Mode -->
                <div class="mb-3">
                    <label for="APP_DEBUG" class="form-label">Debug Mode</label>
                    <select id="APP_DEBUG" name="APP_DEBUG" class="form-select">
                        <option value="true" {{ old('APP_DEBUG', $settings['APP_DEBUG']) ? 'selected' : '' }}>True</option>
                        <option value="false" {{ !old('APP_DEBUG', $settings['APP_DEBUG']) ? 'selected' : '' }}>False</option>
                    </select>
                </div>

                <!-- App Logo -->
                <div class="mb-3">
                    <label for="APP_LOGO" class="form-label">Logo</label>
                    <input type="file" id="APP_LOGO" name="APP_LOGO" class="form-control">
                    <div class="mt-2">
                        <img src="{{ $settings['APP_LOGO'] ? asset($settings['APP_LOGO']) : asset('assets/images/brand/logo/logo-2.svg') }}" 
                             alt="App Logo" height="60" style="border:1px solid #ddd; padding:2px;">
                    </div>
                </div>

                <!-- Favicon -->
                <div class="mb-3">
                    <label for="APP_FAVICON" class="form-label">Favicon</label>
                    <input type="file" id="APP_FAVICON" name="APP_FAVICON" class="form-control">
                    <div class="mt-2">
                        <img src="{{ $settings['APP_FAVICON'] ? asset($settings['APP_FAVICON']) : asset('assets/images/favicon/favicon.ico') }}" 
                             alt="App Favicon" height="30" style="border:1px solid #ddd; padding:2px;">
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i> Save Settings
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
