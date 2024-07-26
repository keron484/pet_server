<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\User;
class loginuserController extends Controller
{
   public function loginuser(Request $request){
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
    
    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
            'password' => ['The provided credentials are incorrect']
        ]);
    }

    $token = $user->createToken('userToken', ['user'])->plainTextToken;

    return response()->json(['message' => 'Logged in successfully', 'token' => $token]);
}

}
