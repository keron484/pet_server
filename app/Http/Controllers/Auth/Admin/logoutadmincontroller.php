<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;

class logoutadmincontroller extends Controller
{
    public function logoutAdmin(Request $request)
    {
        $admin = $request->user();

        if ($admin) {
            $accessToken = $admin->tokens->where('tokenable_id', $admin->id)->first();

            if ($accessToken) {
                $accessToken->delete();
                return response()->json(['message' => 'Admin logged out successfully']);
            } else {
                return response()->json(['message' => 'Admin access token not found'], 404);
            }
        }

        return response()->json(['message' => 'Unauthorized'], 401);
    }
}
