@extends('backend.guest')

@section('title', 'Verify OTP')

@section('content')
<div class="card shadow-sm p-4 text-center" style="width: 400px;">
    <h4 class="mb-3">Enter OTP</h4>
    <p class="text-muted small mb-4">
        We sent a 6-digit OTP to <b>{{ $email }}</b>. Enter it below to reset your password.
    </p>

    <!-- Error / Success -->
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('password.otp.verify') }}">
        @csrf
        <input type="hidden" name="email" value="{{ $email }}">

        <div class="mb-3 text-start">
            <label for="otp" class="form-label">OTP Code</label>
            <input id="otp" type="text" class="form-control @error('otp') is-invalid @enderror"
                   name="otp" required autofocus>
            @error('otp')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <!-- New Password -->
        <div class="mb-3 text-start">
            <label for="password" class="form-label">New Password</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                   name="password" required>
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-3 text-start">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input id="password_confirmation" type="password" class="form-control"
                   name="password_confirmation" required>
        </div>

        <div class="d-grid mt-3">
            <button type="submit" class="btn btn-primary">
                Reset Password
            </button>
        </div>
    </form>
</div>
@endsection
