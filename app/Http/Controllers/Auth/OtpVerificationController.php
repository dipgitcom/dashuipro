<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class OtpVerificationController extends Controller
{
    public function showForm()
    {
        $email = session('verification_email');

        if (!$email) {
            return redirect()->route('verify.otp.form')->with('error', 'No email to verify.');
        }

        return view('backend.auth.verify-otp', compact('email'));
    }

    public function verify(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|digits:6',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'User not found.']);
        }

        if (!Hash::check($request->otp, $user->email_otp)) {
            return redirect()->back()->withErrors(['otp' => 'Invalid OTP.']);
        }

        if (now()->gt($user->email_otp_expires_at)) {
            return redirect()->back()->withErrors(['otp' => 'OTP expired.']);
        }

        // Mark email verified
        $user->email_verified_at = now();
        $user->email_otp = null;
        $user->email_otp_expires_at = null;
        $user->save();

        // // Log in the user
        // Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Your email has been verified and you are logged in.');
    }
}
