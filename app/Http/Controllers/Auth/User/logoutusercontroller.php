<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class logoutusercontroller extends Controller
{
    public function logoutuser(Request $request){
       
            $user = $request->user();
    
            if ($user) {
                $accessToken = $user->tokens->where('tokenable_id', $user->id)->first();
    
                if ($accessToken) {
                    $accessToken->delete();
                    return response()->json(['message' => 'user logged out successfully']);
                } else {
                    return response()->json(['message' => 'user access token not found'], 404);
                }
            }
    
            return response()->json(['message' => 'Unauthorized'], 401);
    }
}
