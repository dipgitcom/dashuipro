@extends('backend.guest')

@section('title', 'OTP for Password Reset')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Password Reset OTP</title>
</head>
<body>
  
    <p>Hello,</p>
    <p>Your password reset OTP is: <strong>{{ $user->password_reset_otp }}</strong></p>
    <p>This OTP is valid for 5 minutes.</p>
    <p>Thank you!</p>
</body>
</html>
