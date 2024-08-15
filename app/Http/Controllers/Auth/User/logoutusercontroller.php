<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class logoutusercontroller extends Controller
{
    public function logoutuser(Request $request){
    
            $request->user()->currentAccessToken()->delete();

            return response()->noContent();
    }
}
