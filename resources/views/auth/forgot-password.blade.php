@extends('backend.guest') <!-- Your custom guest layout -->

@section('title', 'Forgot Password')

@section('content')
<div class="text-center mb-4">
    <a href="{{ url('/') }}">
        <img src="{{ asset('backend/assets/images/brand/logo/logo-2.svg') }}" alt="Logo" height="50">
    </a>
</div>

<div class="mb-4 text-muted">
    {{ __('Forgot your password? No problem. Just enter your email and we will email you a password reset link.') }}
</div>

<!-- Session Status -->
@if (session('status'))
    <div class="alert alert-success mb-4">
        {{ session('status') }}
    </div>
@endif

<form method="POST" action="{{ route('password.email') }}">
    @csrf

    <!-- Email Address -->
    <div class="mb-3">
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="form-control mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
        <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
    </div>

    <div class="d-flex justify-end mt-4">
        <x-primary-button class="btn btn-primary">
            {{ __('Email Password Reset Link') }}
        </x-primary-button>
    </div>
</form>
@endsection
