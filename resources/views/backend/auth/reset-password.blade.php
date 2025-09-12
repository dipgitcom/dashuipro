@extends('backend.guest')

@section('title', 'Reset Password with OTP')

@section('content')
<div class="card shadow-sm p-4 text-center" style="width:400px;">
    <h4 class="mb-3">Reset Password</h4>
    <form method="POST" action="{{ route('password.verifyOtp') }}">
        @csrf
        <div class="mb-3 text-start">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3 text-start">
            <label>OTP</label>
            <input type="text" name="otp" class="form-control" required>
        </div>
        <div class="mb-3 text-start">
            <label>New Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <div class="mb-3 text-start">
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Reset Password</button>
    </form>
</div>
@endsection
