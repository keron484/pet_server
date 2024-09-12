<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class resetPasswordController extends Controller
{
    //
    public function reset_password(Request $request){
        $request->validate([
            'password' => 'required|min:6',
        ]);
    
        // Retrieve email from the session
        $email = session('password_reset_email');
         
        $new_password = Hash::make($request->password);

        User::where('email', $email)->update(['password' => $new_password]);
        
        session()->forget('password_reset_email');

        return response()->json(['message' => 'Password has been successfully reset'], 200);
        
    }
}
