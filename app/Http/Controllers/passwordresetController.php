<?php

namespace App\Http\Controllers;

use App\Mail\otpmail;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class passwordresetController extends Controller
{
    //
    public function request_password_reset_otp(Request $request){
        $request->validate([
            'email' => 'required|email'
        ]);

        $email = $request->email;

        $check_if_user_exist = User::where('email', $email)->exists();

        if(!$check_if_user_exist){
            return response()->json(['message' => "No user exist with this email"], 409);
        }

        $otp = Str::random(6); 

        $expiresAt = now()->addMinutes(10);

        session(['password_reset_email' => $email]);

        PasswordReset::updateOrCreate(
            ['email' => $email],
            ['otp' => $otp, 'created_at' => now(), 'expires_at' => $expiresAt]
        );

       Mail::to($request->email)->send(new otpmail($otp));

    return response()->json([
        'message' => 'A code has been sent to your email',
        'otp' => $otp,
        'time' => $expiresAt
    ], 200);
    }

    public function verify_otp(Request $request){
        $request->validate([
           'otp' => 'required|string'
        ]);

        $otp = $request->otp;

        $email = session('password_reset_email');
         
        $passwordReset = PasswordReset::where('email', $email)
        ->where('otp', $otp)
        ->where('expires_at', '>=', now()) // Ensure OTP is not expired
        ->first();

        if (!$passwordReset) {

        return response()->json([
            'message' => 'Invalid or expired OTP',
            'email' => $email
        ], 400);

       }

       PasswordReset::where('email', $email)->delete();
       
       return response()->noContent();
    }
}
