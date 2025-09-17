<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Mail;
use App\Mail\VerifyOtpMail;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('backend.auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Generate 6-digit OTP securely
        $otp = random_int(100000, 999999);

        // Create user with OTP information; do not set email_verified_at
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_otp' => Hash::make($otp),
            'email_otp_expires_at' => now()->addMinutes(5),
            'email_verified_at' => null,
        ]);

        // Send OTP email (your Mailable should display $otp)
        Mail::to($user->email)->send(new VerifyOtpMail($user, $otp)); 

        // Store verification email in session
        session(['verification_email' => $user->email]);

        // Do not log in user yet (leave Auth::login commented/removed)

        // Redirect to OTP page
        return redirect()->route('verify.otp.form')
                         ->with('status', 'A verification OTP has been sent to your email.');
    }
}
