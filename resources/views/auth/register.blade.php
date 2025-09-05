@extends('backend.guest') <!-- your custom guest layout -->

@section('title', 'Register')

@section('content')
<div class="text-center mb-4">
    <a href="{{ url('/') }}">
        <img src="{{ asset('backend/assets/images/brand/logo/logo-2.svg') }}" alt="Logo" height="50">
    </a>
</div>

<form method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Name -->
    <div class="mb-3">
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" class="form-control mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />
    </div>

    <!-- Email Address -->
    <div class="mb-3">
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="form-control mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
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

    <div class="d-flex justify-content-between align-items-center mt-4">
        <a class="text-decoration-none small" href="{{ route('login') }}">
            {{ __('Already registered?') }}
        </a>

        <x-primary-button class="btn btn-primary ms-2">
            {{ __('Register') }}
        </x-primary-button>
    </div>
</form>
@endsection
