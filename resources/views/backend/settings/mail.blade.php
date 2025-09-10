@extends('backend.master')

@section('title', 'Mail Settings')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Card -->
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold text-white">
                        <i class="bi bi-envelope me-2"></i> Mail Settings
                    </h5>
                    <a href="{{ route('dashboard') }}" class="btn btn-light btn-sm">Back to Dashboard</a>
                </div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('settings.mail.update') }}" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Mail Mailer</label>
                                <input type="text" name="mail_mailer" value="{{ $settings['mail_mailer'] ?? '' }}" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Mail Host</label>
                                <input type="text" name="mail_host" value="{{ $settings['mail_host'] ?? '' }}" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Mail Port</label>
                                <input type="text" name="mail_port" value="{{ $settings['mail_port'] ?? '' }}" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Mail Username</label>
                                <input type="text" name="mail_username" value="{{ $settings['mail_username'] ?? '' }}" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Mail Password</label>
                                <input type="password" name="mail_password" value="{{ $settings['mail_password'] ?? '' }}" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Mail From Address</label>
                                <input type="email" name="mail_from_address" value="{{ $settings['mail_from_address'] ?? '' }}" class="form-control">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label fw-bold">App Name</label>
                                <input type="text" name="app_name" value="{{ $settings['app_name'] ?? '' }}" class="form-control">
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-1"></i> Save Settings
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
