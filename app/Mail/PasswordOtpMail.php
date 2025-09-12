<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordOtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public $otp;

    public function __construct($otp)
    {
        $this->otp = $otp;
    }

//     public function build()
// {
//     return $this->from(config('mail.from.address'), config('mail.from.name'))
//                 ->subject('Password Reset OTP')
//                 ->view('backend.auth.emails.password-otp')
//                 ->with(['otp' => $this->otp]);
// }

}

