@extends('backend.guest') <!-- your custom guest layout -->

@section('title', 'Reset Password')

@section('content')
<div class="text-center mb-4">
    <a href="{{ url('/') }}">
        <img src="{{ asset('backend/assets/images/brand/logo/logo-2.svg') }}" alt="Logo" height="50">
    </a>
</div>

<form method="POST" action="{{ route('password.store') }}">
    @csrf

    <!-- Password Reset Token -->
    <input type="hidden" name="token" value="{{ $request->route('token') }}">

    <!-- Email Address -->
    <div class="mb-3">
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="form-control mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
    </div>

    <!-- Password -->
    <div class="mb-3">
        <x-input-label for="password" :value="__('Password')" />
        <x-text-input id="password" class="form-control mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
        <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
    </div>

    <!-- Confirm Password -->
    <div class="mb-3">
        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
        <x-text-input id="password_confirmation" class="form-control mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
    </div>

    <div class="d-flex justify-end mt-4">
        <x-primary-button class="btn btn-primary">
            {{ __('Reset Password') }}
        </x-primary-button>
    </div>
</form>
@endsection
