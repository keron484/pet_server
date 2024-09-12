<?php

namespace App\Http\Controllers\Auth\User;

use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class changepasswordController extends Controller
{
    public function change_user_password(Request $request){
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        $authenticated_user = auth()->guard('user')->user();

        
        if (!$this->checkCurrentPassword($authenticated_user, $request->current_password)) {
            throw ValidationException::withMessages([
                'current_password' => ['Current password is incorrect.'],
            ]);
        }

        

        if ($this->updatePassword($authenticated_user, $request->new_password)) {
            return response()->json(['message' => 'Password changed successfully.'], 200);
        }
    }

    protected function checkCurrentPassword($authenticated_user, string $currentPassword): bool
    {
        return Hash::check($currentPassword, $authenticated_user->password);
    }

    protected function updatePassword($authenticated_user, string $newPassword): bool
    {

        $authenticated_user->password = Hash::make($newPassword);
        return $authenticated_user->save(); 
    }
}
