<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\User;
class accountrecoveryController extends Controller
{
    public function sendOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $user = User::where('email', $request->input('email'))->first();

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $otp = Str::random(6);
        $user->otp = Hash::make($otp);
        $user->save();

       // Mail::to($user->email)->send(new OtpEmail($user, $otp));

        return response()->json(['message' => 'Otp sent successfully'], 200);
    }

    public function verifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'otp' => 'required|digits:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }

        $user = User::where('email', $request->input('email'))->first();

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        if (!Hash::check($request->input('otp'), $user->otp)) {
            return response()->json(['error' => 'Invalid otp'], 422);
        }

        // Update user password and login the user
        $new_password = Str::random(8);
        $user->password = Hash::make($new_password);
        $user->save();

        Auth::login($user);

        return response()->json(['message' => 'Account recovered successfully'], 200);
    }
}
