@extends('backend.master')

@section('title', 'Mail Settings')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 text-primary fw-bold">
                        <i class="bi bi-envelope me-2"></i> Mail Settings
                    </h5>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('settings.mail.update') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Mail Mailer</label>
                            <input type="text" name="mail_mailer" value="{{ $settings['mail_mailer'] ?? '' }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mail Host</label>
                            <input type="text" name="mail_host" value="{{ $settings['mail_host'] ?? '' }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mail Port</label>
                            <input type="text" name="mail_port" value="{{ $settings['mail_port'] ?? '' }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mail Username</label>
                            <input type="text" name="mail_username" value="{{ $settings['mail_username'] ?? '' }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mail Password</label>
                            <input type="password" name="mail_password" value="{{ $settings['mail_password'] ?? '' }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mail From Address</label>
                            <input type="email" name="mail_from_address" value="{{ $settings['mail_from_address'] ?? '' }}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">App Name</label>
                            <input type="text" name="app_name" value="{{ $settings['app_name'] ?? '' }}" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save me-1"></i> Save Settings
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
